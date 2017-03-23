<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/3
 * Time: 16:07
 */

namespace App\Admin\Controllers\Products;


use App\Admin\Bases\SchemaBuilder;
use App\Admin\Models\Products\Specification;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\Schema;

class SpecificationController extends Controller
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
		return Admin::grid(Specification::class, function (Grid $grid) {
			$model = $this->form()->model();
			$schemaBuilder = new SchemaBuilder();
			$getSpecificationColumns = $schemaBuilder->getTableColumns($model['table']);
			$grid->model()->ordered();
			$grid->spec_name($getSpecificationColumns['spec_name']);
			$grid->spec_memo($getSpecificationColumns['spec_memo']);
			$grid->spec_type($getSpecificationColumns['spec_type'])->display(function ($spec_type) {
				if ($spec_type == 'text')
					$spec_type = '文本';
				else
					$spec_type = '图片';
				return $spec_type;
			});
			$grid->spec_show_type($getSpecificationColumns['spec_show_type'])->display(function ($spec_type) {
				if ($spec_type == 'flat')
					$spec_type = '平铺';
				else
					$spec_type = '选择';
				return $spec_type;
			});
//			$grid->p_order($getSpecificationColumns['p_order'])->orderable();
			$grid->alias($getSpecificationColumns['alias']);
//			$grid->actions(function ($actions) {
//				// 当前行的数据数组
//				$actions->row;
//				// 获取当前行主键值
//				$actions->getKey();
//				$url = url('/admin/spec?values=' . $actions->getKey());
//				$actions->prepend('<a href=' . $url . '>编辑货品 | ');
//			});
		});
	}

	public function form()
	{
		return Admin::form(Specification::class, function (Form $form) {
			$model = $form->model();
			$schemaBuilder = new SchemaBuilder();
			$getSpecColumns = $schemaBuilder->getTableColumns($model['table']);

			$getSpecvalueColumns = $schemaBuilder->getTableColumns('spec_values');
			$form->tab('基础信息', function ($form) use ($getSpecColumns) {
				$form->text('spec_name', $getSpecColumns['spec_name']);
				$form->textarea('spec_memo', $getSpecColumns['spec_memo']);

				$form->select('spec_type', $getSpecColumns['spec_type'])->options(function () {
					$option = [
						'image' => '图片',
						'text' => '文本',
					];
					return $option;
				});
				$form->select('spec_show_type', $getSpecColumns['spec_show_type'])->options(function () {
					$option = [
						'select' => '选择',
						'flat' => '平铺'
					];
					return $option;
				});
				$form->number('p_order', $getSpecColumns['p_order']);
				$form->text('alias', $getSpecColumns['alias']);
			});
			$form->tab('工作頻段规格', function ($form) use ($getSpecvalueColumns) {
				$getSpecvalueColumns['view'] = 'spec_value';
				$form->editordatetable($getSpecvalueColumns);
			});

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
			$content->body($this->form());
		});
	}


	public function update()
	{

	}
}
