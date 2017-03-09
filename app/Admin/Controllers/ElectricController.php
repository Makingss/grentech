<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/6
 * Time: 17:47
 */

namespace App\Admin\Controllers;


use App\Admin\Models\Electric;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class ElectricController extends Controller
{
	public function getIndex($id)
	{
		$query = Electric::select(['id', 'product_id','workingband', 'x_beamwidth', 'y_beamwidth', 'beamgain', 'polarization', 'dipangle', 'xpd',
			'ratio', 'inhibition', 'voltagebobbi', 'isolation', 'imd3', 'impedance', 'capacity'
		])->where(['id' => $id]);

		return Datatables::of($query)->editColumn('product_id', '{{$product_id}}')->setRowId('id')->setRowClass(function ($spec_value) {
			return $spec_value->spec_value_id % 2 == 0 ? '' : '';
		})->setRowData([
			'id' => 'test',
		])->setRowAttr([
			'color' => '#C0C0C0',
		])->make(true);
	}

	public function setAjax(Request $request)
	{
		$ajax_data = $request->all();
		foreach ($ajax_data['data'] as $requsetKey => $requsetValue) {
			if ($ajax_data['action'] == 'edit') {
				DB::table('electrics')->where(['id' => array_keys($ajax_data['data'])])->update($requsetValue);//[current($k_val) => current($requsetValue)]
				$spec_id = DB::table('electrics')->where('id', array_keys($ajax_data['data']))->value('id');;
				$res = $this->getIndex($spec_id);
			} elseif ($ajax_data['action'] == 'create') {
				$id = DB::table('electrics')->insertGetId($requsetValue);
				$res = $this->getIndex($id);
			} else if ($ajax_data['action'] == 'remove') {
				DB::table('electrics')->where(['id' => $requsetValue['id']])->delete();
			}

		}
		if ($ajax_data['action'] == 'remove') {
			$res = $this->getIndex($requsetValue['id']);
		}
		return $res;
	}
}