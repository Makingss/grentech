<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/6
 * Time: 13:37
 */

namespace App\Http\Controllers;


use App\Admin\Models\Products\Product;

class Spec_valueController extends Controller
{
	public function spec_value($spec_id = null, $spec_value_id = null)
	{
		if ($spec_id) {
			$spec_value = Product::select(['spec_value_id', 'spec_id', 'spec_value', 'alias', 'spec_image', 'p_order'])->where(['spec_id' => $spec_id]);
		} elseif ($spec_value_id) {
			$spec_value = Product::select(['spec_value_id', 'spec_id', 'spec_value', 'alias', 'spec_image', 'p_order'])->where(['spec_value_id' => $spec_value_id]);
		}
		$product_datas = Datatables::of($spec_value)->editColumn('bn', '{{$bn}}')->setRowId('product_id')->setRowClass(function ($spec_value) {
			return $spec_value->spec_value_id % 2 == 0 ? '' : '';
		})->setRowData([
			'product_id' => 'test',
		])->setRowAttr([
			'color' => '#C0C0C0',
		])->make(true);
		return $product_datas;
	}

	public function specvalue_editor(Request $request)
	{
		$ajax_data = $request->all();
		dd($ajax_data);
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