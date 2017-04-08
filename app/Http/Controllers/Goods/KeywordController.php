<?php
namespace App\Http\Controllers\Goods;

use App\Admin\Models\Ectools\Keyword;
use App\Admin\Models\Goods\Good;
use App\Admin\Models\Goods\Goods_keyword;
use App\Admin\Models\Images\Image_attach;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoodsController;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/27
 * Time: 16:35
 */
class KeywordController extends Controller
{
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getKeywords()
	{
		return Keyword::all();//->get(['id', 'keyname']);
	}

	/**
	 * @param Request $request
	 */
	public function similarByKeys(Request $request)
	{
		if (is_numeric($request->get('id'))) {
			$goods_ids = Goods_keyword::where('keyword_id', $request->get('id'))->get(['good_id'])->toArray();
		} else {
			$keyids = Keyword::where('keyname', 'like', '%' . $request->get('id') . '%')->get(['id'])->toArray();
			$goods_ids = Goods_keyword::whereIn('keyword_id', $keyids)->get(['good_id'])->toArray();
		}

		$collect = collect($goods_ids)->map(function ($goods_id) {
			foreach ($goods_id as $key => $id)
				$goods_id['goods_id'] = $id;
			unset($goods_id[$key]);
			return $goods_id;
		})->toArray();

		if (is_array($collect)) {
			$request->offsetSet('parameters', $collect);
			$getGoods = $this->multipleGoods($request);
		}
		return $getGoods;
	}


	public function multipleGoods(Request $request)
	{
		$per_page = $request->get('per_page');
		$relations = $request->get('relations') ? $request->get('relations') : 'image_attach';
		$parameters = $request->get('parameters');
		$cols = collect($parameters);
		foreach ($parameters as $parameter)
			if (is_array($parameter)) {
				$keys = array_keys($parameter);
				$plucked = $cols->pluck($keys[0]);
				$multiplied = $plucked->map(function ($col) {
					return (int)$col;
				});//->implode(',');
//				$parameters = [$keys[0] => $multiplied->toArray()];
			}
//		$collection = collect($parameters);
//		$filtered = $collection->only(['brand_id', 'goods_id', 'type_id', 'cat_id', 'bn']);
//		$wheres = $filtered->all();
		$withRelations = collect($relations);
		$filteredRelations = $withRelations->except(['Goods_types', 'mechanics', 'goods_ports', 'assemblies', 'standardfits', 'electrics',
			'goods_keywords', 'products', 'brands', 'goods_lv_price', 'member_goods', 'image_attach', 'images',
			'goods_cats', 'aspect_pics'
		]);
		$with = $filteredRelations->all();

		$goods = Good::with($with)->whereIn($keys[0], $multiplied)->orderBy('updated_at', 'DESC')->paginate($per_page)->toArray();
		foreach ($goods['data'] as $dataK => $data) {
			foreach ($data['image_attach'] as $itemK => $item) {
				$image_attach = Image_attach::with('images')->where('image_id', $item['image_id'])->get()->toArray();
				$collects = collect($image_attach);
				$collapse = $collects->collapse();
				$goods['data'][$dataK]['image_attach'][$itemK] = $collapse->toArray();

			}
		}
//		return $goods;
		return json_encode($goods);
	}

}