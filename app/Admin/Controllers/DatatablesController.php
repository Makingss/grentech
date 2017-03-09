<?php
namespace App\Admin\Controllers;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/4
 * Time: 10:16
 */


use App\Admin\Models\Good;
use App\Admin\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
	public function index()
	{
		$products = Product::findOrFail(1);
		return view('datatables.index', compact('products'));
	}

	public function anyData()
	{
		return Datatables::of(Good::query())->make(true);
	}
}