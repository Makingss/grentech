<?php
namespace App\Admin\Bases;
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/4
 * Time: 10:16
 */

namespace App\Admin\Bases;


use App\Admin\Models\Good;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
	public function getIndex()
	{
		return view('datatables.index');
	}

	public function anyData()
	{
		return Datatables::of(Good::query())->make(true);
	}
}