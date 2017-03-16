<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/16
 * Time: 14:54
 */

namespace App\Http\Controllers;


use App\Admin\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
	public function getBrand(Request $request)
	{
		$per_page = $request->get('per_page');
		$collections = collect($request->all());
		$collections->only(['brand_id', 'brand_name', 'brand_keywords']);
		$where = $collections->all();
		$brands = Brand::where($where)->paginate($per_page)->toJson();
		return $brands;
	}
}