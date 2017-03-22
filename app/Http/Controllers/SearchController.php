<?php

namespace App\Http\Controllers;

use App\Admin\Models\Good;
use App\Admin\Models\Image_attach;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$per_page = $request->get('per_page');
		$relations = $request->get('relations') ? $request->get('relations') : 'image_attach';
		$query = $request->get('search');
//		$collection = collect($parameters);
//		$filtered = $collection->only(['brand_id', 'goods_id', 'type_id', 'cat_id', 'bn']);
//		$where = $filtered->all();
		$withRelations = collect($relations);
		$filteredRelations = $withRelations->except(['goods_types', 'mechanics', 'goods_ports', 'assemblies', 'standardfits', 'electrics',
				'goods_keywords', 'products', 'brands', 'goods_lv_price', 'member_goods', 'image_attach', 'images', 'goods_cats']
		);
		$with = $filteredRelations->all();
		$goods = Good::search($query)->with($with)->paginate($per_page)->toArray();
		foreach ($goods['data'] as $dataK => $data) {
			foreach ($data['image_attach'] as $itemK => $item) {
				$image_attach = Image_attach::with('images')->where('image_id', $item['image_id'])->get()->toArray();
				$collects = collect($image_attach);
				$collapse = $collects->collapse();
				$goods['data'][$dataK]['image_attach'][$itemK] = $collapse->toArray();

			}
		}
		return json_encode($goods);

	}
}
