<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/8
 * Time: 20:02
 */
namespace App\Admin\Controllers;

use App\Admin\Bases\SchemaBuilder;
use App\Http\Controllers\Controller;
use App\Admin\Models\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;

class GoodsTypeController extends Controller
{
    use ModelForm;

    public function index()
    {
        $content = Admin::content(function (Content $content) {
            $content->header(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.header'));
            $content->description(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.description'));
            $content->body($this->grid());

        });
        return $content;
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.header'));
            $content->description(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.description'));
            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.header'));
            $content->description(trans('admin::lang.goods.goodstype').trans('admin::lang.headers.description'));
            $content->body($this->form());
        });
    }

    protected function grid()
    {
        $grid = Admin::grid(Goods_type::class, function (Grid $grid) {
            $schemaBuilder=new SchemaBuilder();
            $model=$this->form()->model();
            $getGoodsTypeColumns=$schemaBuilder->getTableColumns($model['table']);
            $grid->type_id($getGoodsTypeColumns['type_id']);
            $grid->name($getGoodsTypeColumns['name'])->editable();
            $grid->alias($getGoodsTypeColumns['alias'])->label();
//            $grid->type_alias('别名')->value(function ($type_alias) {
//                return \GuzzleHttp\json_decode($type_alias);
//            })->label();
            $grid->is_physical($getGoodsTypeColumns['is_physical'])->value(function ($is_physical) {
                return $is_physical ? trans('admin::lang.yes') : trans('admin::lang.no');
            });
            $grid->schema_id($getGoodsTypeColumns['schema_id'])->editable();
            $grid->created_at();
            $grid->updated_at();

        });
        return $grid;

    }

    protected function form()
    {
        return Admin::Form(Goods_type::class,function(\Encore\Admin\Form $form){
            $form->tab(trans('admin::lang.goods.baseset'),function($form){
                $model=$form->model();
                $schemaBuilder=new SchemaBuilder();
                $getGoodsTypeColumns=$schemaBuilder->getTableColumns($model['table']);
                $form->text('name',$getGoodsTypeColumns['name']);
                $form->text('alias',$getGoodsTypeColumns['alias']);
                $form->radio('is_physical',$getGoodsTypeColumns['is_physical'])->options(['1' => trans('admin::lang.yes'), '0'=> trans('admin::lang.no')])->default('1');
                $form->text('schema_id',$getGoodsTypeColumns['schema_id']);
                $form->display('created_at');
                $form->display('updated_at');
            });
            $form->tab(trans('admin::lang.goods.spec'),function($form){
                $form->text();
            });
            $form->tab(trans('admin::lang.goods.pricerange'),function($form){
                $form->text();
            });
            $form->tab(trans('admin::lang.goods.extattribute'),function($form){
                $form->text();
            });

        });

    }
}