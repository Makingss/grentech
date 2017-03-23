<?php

namespace App\Http\Controllers;

use App\Admin\Models\Goods\Goods_cat;
use Illuminate\Http\Request;

class GoodsCatController extends Controller
{
	public function index()
	{
		$goods_cats = Goods_cat::all(['cat_id', 'parent_id', 'type_id', 'cat_name', 'p_order']);
		return $goods_cats;
	}
}
