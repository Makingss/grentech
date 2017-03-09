<?php
namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/4
 * Time: 10:16
 */


use App\Admin\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
	public function index()
	{
		return view('datatables.index');
	}

	public function anyData($goods_id = null, $product_id = null)
	{
		if ($goods_id) {
			$product = Product::select(['goods_id', 'product_id', 'bn', 'price', 'cost', 'mktprice', 'store', 'freez', 'store_place', 'unit', 'is_default','spec_info'])->where(['goods_id' => $goods_id]);
		} elseif ($product_id) {
			$product = Product::select(['goods_id', 'product_id', 'bn', 'price', 'cost', 'mktprice', 'store', 'freez', 'store_place', 'unit', 'is_default','spec_info'])->where(['product_id' => $product_id]);
		}
		$product_datas = Datatables::of($product)->editColumn('bn', '{{$bn}}')->setRowId('product_id')->setRowClass(function ($product) {
			return $product->product_id % 2 == 0 ? '' : '';
		})->setRowData([
			'product_id' => 'test',
		])->setRowAttr([
			'color' => '#C0C0C0',
		])->make(true);
		return $product_datas;
	}

	public function editor(Request $request)
	{
		$ajax_data = $request->all();
		foreach ($ajax_data['data'] as $requsetKey => $requsetValue) {
			if ($ajax_data['action'] == 'edit') {
				DB::table('products')->where(['product_id' => array_keys($ajax_data['data'])])->update($requsetValue);//[current($k_val) => current($requsetValue)]
				$goods_id = DB::table('products')->where('product_id', array_keys($ajax_data['data']))->value('goods_id');;
				$res = $this->anyData($goods_id);
			} elseif ($ajax_data['action'] == 'create') {
				$id = DB::table('products')->insertGetId($requsetValue);
				$res = $this->anyData(null, $id);
			} else if ($ajax_data['action'] == 'remove') {
				DB::table('products')->where(['product_id' => $requsetValue['product_id']])->delete();
			}

		}
		if ($ajax_data['action'] == 'remove') {
			$res = $this->anyData($requsetValue['goods_id']);
		}
		return $res;

	}



}