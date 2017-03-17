<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/9
 * Time: 9:19
 */

namespace App\Http\Controllers;


use App\Admin\Models\Good;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
	/**
	 * 显示前端首页面
	 */
	public function getGoods(Request $request)
	{
		dd($request->all());
		$per_page = $request->get('per_page');
		$relations = $request->get('relations');
		$parameters = $request->get('parameters');
		$collection = collect($parameters);
		$filtered = $collection->only(['brand_id', 'goods_id', 'type_id', 'cat_id', 'bn']);
		$where = $filtered->all();

		$withRelations = collect($relations);
		$filteredRelations = $withRelations->only('Goods_types', 'mechanics', 'goods_ports', 'assemblies', 'standardfits', 'electrics',
			'goods_keywords', 'products', 'brands', 'goods_lv_price', 'member_goods', 'image_attach', 'images'
		);
		$with = $filteredRelations->all();
		$goods = Good::with($with)->where($where)->paginate($per_page)->toJson();
		return $goods;
	}

}