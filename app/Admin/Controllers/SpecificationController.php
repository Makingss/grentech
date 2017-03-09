<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/3
 * Time: 16:07
 */

namespace App\Admin\Controllers;


use App\Admin\Models\Specification;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;

class SpecificationController extends Controller
{
	use ModelForm;

	public function index()
	{

	}

	public function grid()
	{
		return Admin::grid(Specification::class, function (Grid $grid) {
			$grid->spec_name();
		});
	}

	public function form()
	{

	}

	public function edit()
	{

	}

	public function create()
	{

	}

	public function update()
	{

	}
}