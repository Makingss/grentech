<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/9
 * Time: 9:19
 */

namespace App\Http\Controllers;


use App\Admin\Bases\SchemaBuilder;
use App\Admin\Models\Goods\Good;
use App\Admin\Models\Images\Image;
use App\Admin\Models\Images\Image_attach;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
	/**
	 * 显示前端首页面
	 */
	public function getGoods(Request $request)
	{
		$per_page = $request->get('per_page');
		$relations = $request->get('relations');
		$parameters = $request->get('parameters');
		$collection = collect($parameters);
		$filtered = $collection->only(['brand_id', 'goods_id', 'type_id', 'cat_id', 'bn']);
		$where = $filtered->all();
		$withRelations = collect($relations);
		$filteredRelations = $withRelations->except(['Goods_types', 'mechanics', 'goods_ports', 'assemblies', 'standardfits', 'electrics',
				'goods_keywords', 'products', 'brands', 'goods_lv_price', 'member_goods', 'image_attach', 'images', 'goods_cats']
		);
		$with = $filteredRelations->all();
		$goods = Good::with($with)->where($where)->paginate($per_page)->toArray();
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

	/**
	 * @param Request $request
	 * @return array
	 * return  tableColumns
	 */
	public function getTableColumns(Request $request)
	{
		$tables = $request->get('relations');
		$getTableColumns = [];
		$schemaBuilder = new SchemaBuilder();

		if (is_array($tables)) {
			foreach ($tables as $table)
				$getTableColumns[$table] = $schemaBuilder->getTableColumns($table);
		} else {
			$getTableColumns[$tables] = $schemaBuilder->getTableColumns($tables);
		}
		return $getTableColumns;
	}
}