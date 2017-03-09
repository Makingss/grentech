<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/9
 * Time: 9:19
 */

namespace App\Http\Controllers;


use App\Admin\Models\Good;

class GoodsController extends Controller
{
	/**
	 * 显示前端首页面
	 */
	public function getindex($number = 30)
	{
		$goods = Good::with('products', 'Goods_types', 'mechanics', 'goods_ports', 'assemblies', 'standardfits', 'electrics')->get();
//		$goods = Good::find(1);
//		dd($goods);
		return view('vue-app.src.App',compact('goods'));
	}
}