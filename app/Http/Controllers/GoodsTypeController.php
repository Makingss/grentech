<?php

namespace App\Http\Controllers;

use App\Admin\Models\Goods_type;
use Illuminate\Http\Request;

class GoodsTypeController extends Controller
{
    public function index(){
		$goodsTypes=Goods_type::with('Goods_cats')->where([])->get(['type_id','name']);
		return $goodsTypes;
	}
}
