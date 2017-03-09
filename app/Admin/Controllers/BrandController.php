<?php
namespace App\Admin\Controllers;

use App\Admin\Bases\SchemaBuilder;
use App\Admin\Models\Brand;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Facades\Facades;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/18
 * Time: 10:53
 */
class BrandController extends Controller
{
	use ModelForm;

	public function index()
	{
		return Admin::content(function (Content $content) {
			$content->header();
			$content->description();
			$content->body($this->grid());
		});
	}

	public function grid()
	{
		return Admin::grid(Brand::class, function (Grid $grid) {
			$model = $this->form()->model();
			$schemaBuilder = new SchemaBuilder();
			$getBrandColumns = $schemaBuilder->getTableColumns($model['table']);
			$grid->model()->ordered();
//			$grid->brand_id('ID')->sortable();
			$grid->brand_name($getBrandColumns['brand_name'])->editable();
			$grid->brand_keywords($getBrandColumns['brand_keywords'])->editable();
			$grid->ordernum($getBrandColumns['ordernum'])->orderable();
			$grid->brand_logo($getBrandColumns['brand_logo'])->image('http://grentech.app/uploads/', 100, 100);
			$grid->brand_url($getBrandColumns['brand_url'])->urlwrapper();
		});
	}

	public function form()
	{
		return Admin::form(Brand::class, function (\Encore\Admin\Form $form) {
			$model = $form->model();
			$schemaBuilder = new SchemaBuilder();
			$getBrandColumns = $schemaBuilder->getTableColumns($model['table']);
			$form->text('brand_name', $getBrandColumns['brand_name']);
			$form->text('brand_keywords', $getBrandColumns['brand_keywords']);
			$form->number('ordernum', $getBrandColumns['ordernum']);
			$form->image('brand_logo',$getBrandColumns['brand_logo']);
			$form->url('brand_url', $getBrandColumns['brand_url']);
		});
	}

	public function edit($id)
	{

		return Admin::content(function (Content $content) use ($id) {
			$content->header();
			$content->description();
			$content->body($this->form()->edit($id));
		});
	}

	public function create()
	{
		return Admin::content(function (Content $content) {
			$content->header();
			$content->description();
//			$content->body($this->form());


			$content->body($this->form()->render());
//			$content->body($this->form()->render());
		});
	}
}