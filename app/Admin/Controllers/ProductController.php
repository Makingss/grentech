<?php

namespace App\Admin\Controllers;

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
            $content->header('产品信息');
            $content->description('产品信息列表');
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
        $grid = Admin::grid(Product::class, function (Grid $grid){
//            $grid->model()->where('goods_id',$id);
//            if(!is_numeric($id)){
//                $grid->disableCreation();
//            }
            $grid->disableCreation();
            $grid->disableExport();
            $grid->disableFilter();
            $grid->filter(function ($filter) {
                $filter->useModal();
                $filter->is('goods_id', '商品ID');
                $filter->like('bn', '货号');
                $filter->disableIdFilter();
            });
            $states = [
                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
            ];
            $grid->bn('货号')->editable();
            $grid->store('库存')->editable();
            $grid->freez('冻结库存');
            $grid->price('售销价')->editable();
            $grid->cost('成本价')->editable();
            $grid->mktprice('市场价')->editable();
            $grid->column('活动价')->editable();
            $grid->unit('单位');
            $grid->marketable('上架')->switch($states);
            $grid->is_default('默认货品')->switch($states);
            $grid->store_place('库位');
            $grid->actions(function ($actions) {
//                $actions->disableDelete();
                $actions->disableEdit();
            });
//            dd($grid->build());
        });
        return $grid;
    }

    public function form()
    {
        return Admin::form(Product::class, function (\Encore\Admin\Form $form) {
            $states = [
                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
            ];
            $form->text('bn', '货号')->rules('required|min:3');
            $form->number('goods_id');
            $form->text('store', '库存')->rules('required|min:1');
            $form->display('freez', '冻结库存');
//            $form->text('freez', '冻结库存');
            $form->text('price', '售销价')->rules('required|min:1');
            $form->text('cost', '成本价')->rules('required|min:1');
            $form->text('mktprice', '市场价')->rules('required|min:1');
//            $form->text('', '活动价');
            $form->text('unit', '单位');
            $form->switch('marketable', '上架')->states($states);
            $form->switch('is_default', '默认货品')->states($states);
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
            $content->header('产品信息');
            $content->description('产品信息列表');
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
            $content->header('产品信息');
            $content->description('产品信息列表');
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
//        //
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
