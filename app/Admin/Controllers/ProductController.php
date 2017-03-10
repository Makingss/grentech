<?php

namespace App\Admin\Controllers;

use App\Admin\Bases\SchemaBuilder;
use App\Admin\Models\Product;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	use ModelForm;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Admin::content(function (Content $content) {
			$content->header(trans('admin::lang.products.product') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.products.product') . trans('admin::lang.headers.description'));
			$content->body($this->grid());
		});

	}

//    public function show(Request $request,$id)
//    {
//        $request->session()->flash('goods_id',$id);
////        dd($values);
//        $content = Admin::content(function (Content $content) use ($id) {
//            $content->header('产品信息');
//            $content->description('产品信息列表');
//            $content->body($this->grid($id));
//        });
//        return $content;
//    }

	public function grid()
	{
		$grid = Admin::grid(Product::class, function (Grid $grid) {
			$options = ['件', '台', '套'];
//            $grid->model()->where('goods_id',$id);
//            if(!is_numeric($id)){
//                $grid->disableCreation();
//            }
			$model = $this->form()->model();
			$schemaBuilder = new SchemaBuilder();
			$getProductColumns = $schemaBuilder->getTableColumns($model['table']);
			$grid->disableCreation();
			$grid->disableExport();
//            $grid->disableFilter();
			$grid->filter(function ($filter) use ($getProductColumns) {
				$filter->useModal();
				$filter->is('goods_id', $getProductColumns['goods_id']);
				$filter->like('bn', $getProductColumns['bn']);
				$filter->is('store_place', $getProductColumns['store_place']);
				$filter->between('created_at', 'Created Time')->datetime();
				$filter->disableIdFilter();
			});
			$states = [
				'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
				'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
			];
			$grid->bn($getProductColumns['bn'])->editable();
			$grid->store($getProductColumns['store'])->editable();
			$grid->freez($getProductColumns['freez']);
			$grid->price($getProductColumns['price'])->editable();
			$grid->cost($getProductColumns['cost'])->editable();
			$grid->mktprice($getProductColumns['mktprice'])->editable();
			$grid->column('活动价')->editable();
			$grid->unit($getProductColumns['unit'])->editable('select', array_combine($options, $options));
			$grid->marketable($getProductColumns['marketable'])->switch($states);
			$grid->is_default($getProductColumns['is_default'])->switch($states);
			$grid->store_place($getProductColumns['store_place']);
			$grid->actions(function ($actions) {
//                $actions->disableDelete();
//                $actions->disableEdit();
			});
		});
		return $grid;
	}

	public function form()
	{
		return Admin::form(Product::class, function (\Encore\Admin\Form $form) {
			$model = $form->model();
			$schemaBuilder = new SchemaBuilder();
			$getPruductColumns = $schemaBuilder->getTableColumns($model['table']);
			$form->tab(trans('admin::lang.products.details'), function ($form) use ($getPruductColumns) {
				$form->divide();
				$getPruductColumns['view'] = 'editordatatable';
				$form->editordatetable($getPruductColumns);
			});
			$form->setAction();
//				$schemaBuilder = new SchemaBuilder();
//				$column = $schemaBuilder->getTableColumns('products');
//				$collection = collect($column);
//				$column['getKey'] = $model->getKey();
//				$keys['keys'] = $collection->keys()->all();
//				foreach ($keys['keys'] as $key_value) {
//					$column['keys'][$key_value] = $key_value;
//				}
//				dd($column);
//				return view('admin.form.editordatetable', compact('column'));

//            $states = [
//                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
//                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
//            ];
//            $form->text('bn', $getPruductColumns['bn'])->rules('required|min:3');
//            $form->text('goods_id',$getPruductColumns['goods_id']);
//            $form->text('store', $getPruductColumns['store'])->rules('required|min:1');
//            $form->display('freez', $getPruductColumns['freez']);
//            $form->text('price', $getPruductColumns['price'])->rules('required|min:1');
//            $form->text('cost', $getPruductColumns['cost'])->rules('required|min:1');
//            $form->text('mktprice', $getPruductColumns['mktprice'])->rules('required|min:1');
//            $form->text('unit', $getPruductColumns['unit']);
//            $form->switch('marketable', $getPruductColumns['marketable'])->states($states);
//            $form->switch('is_default', $getPruductColumns['is_default'])->states($states);
//            $form->setAction('/admin/product/store');
//            $form->select('store_place','库位')->options(function(){
//                return '';
		});

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return Admin::content(function (Content $content) {
			$content->header(trans('admin::lang.products.product') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.products.product') . trans('admin::lang.headers.description'));
			$content->body($this->form());
		});
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
//    public function store(Request $request)
//    {
//        dd("dd" . $request);
//    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
//    public function show($id)
//    {
//        //
//    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return Admin::content(function (Content $content) use ($id) {
			$content->header(trans('admin::lang.products.product') . trans('admin::lang.headers.header'));
			$content->description(trans('admin::lang.products.product') . trans('admin::lang.headers.description'));
			$content->body($this->form()->edit($id));
		});
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
//    public function update(Request $request, $id)
//    {
//        dd($request);
//    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
//    public function destroy($id)
//    {
//        //
//    }
}
