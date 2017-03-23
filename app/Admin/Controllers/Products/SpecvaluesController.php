<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/3
 * Time: 22:27
 */

namespace App\Admin\Controllers\Products;


use App\Admin\Models\Products\Spec_value;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class SpecvaluesController extends Controller
{
//	public function index(){
//		Admin::content();
//	}
//
//	public function grid(){
//
//	}
//	public function form(){
//
//	}
//	public function edit(){
//
//	}
//	public function create(){
//
//	}

	public function spec_value($spec_id = null, $spec_value_id = null)
	{
		if ($spec_id) {
			$spec_value = Spec_value::select(['spec_value_id', 'spec_id', 'spec_value', 'alias', 'spec_image', 'p_order'])->where(['spec_id' => $spec_id]);
		} elseif ($spec_value_id) {
			$spec_value = Spec_values::select(['spec_value_id', 'spec_id', 'spec_value', 'alias', 'spec_image', 'p_order'])->where(['spec_value_id' => $spec_value_id]);
		}
		$spec_datas = Datatables::of($spec_value)->editColumn('spec_value', '{{$spec_value}}')->setRowId('spec_value_id')->setRowClass(function ($spec_value) {
			return $spec_value->spec_value_id % 2 == 0 ? '' : '';
		})->setRowData([
			'spec_value_id' => 'test',
		])->setRowAttr([
			'color' => '#C0C0C0',
		])->make(true);
		return $spec_datas;
	}

	public function specvalue_editor(Request $request)
	{
		$ajax_data = $request->all();
		foreach ($ajax_data['data'] as $requsetKey => $requsetValue) {
			if ($ajax_data['action'] == 'edit') {
				DB::table('spec_values')->where(['spec_value_id' => array_keys($ajax_data['data'])])->update($requsetValue);//[current($k_val) => current($requsetValue)]
				$spec_id = DB::table('spec_values')->where('spec_value_id', array_keys($ajax_data['data']))->value('spec_id');;
				$res = $this->spec_value($spec_id);
			} elseif ($ajax_data['action'] == 'create') {
				$id = DB::table('spec_values')->insertGetId($requsetValue);
				$res = $this->spec_value(null, $id);
			} else if ($ajax_data['action'] == 'remove') {
				DB::table('spec_values')->where(['spec_value_id' => $requsetValue['spec_value_id']])->delete();
			}

		}
		if ($ajax_data['action'] == 'remove') {
			$res = $this->spec_value($requsetValue['spec_id']);
		}
		return $res;

	}
}