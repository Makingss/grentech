<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/8
 * Time: 20:02
 */
namespace App\Admin\Controllers;

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
            $content->header('商品类型');
            $content->description('商品类型列表');
            $content->body($this->grid());

        });
        return $content;
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('商品类型');
            $content->description('商品类型列表');
            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建商品类型');
            $content->description('新建商品类型列表');
//            dd($this->form());
            $content->body($this->form());
        });
    }

    protected function grid()
    {
        $grid = Admin::grid(Goods_type::class, function (Grid $grid) {
            $grid->type_id('type_id');
            $grid->name('类型名称')->editable();
            $grid->alias('别名')->label();
//            $grid->type_alias('别名')->value(function ($type_alias) {
//                return \GuzzleHttp\json_decode($type_alias);
//            })->label();
            $grid->is_physical('实体商品')->value(function ($is_physical) {
                return $is_physical ? '是' : '否';
            });
            $grid->schema_id('供应商编码')->editable();
            $grid->created_at('创建时间');
            $grid->updated_at('最后更新时间');

        });
        return $grid;

    }

    protected function form()
    {
        return Admin::Form(Goods_type::class,function(\Encore\Admin\Form $form){
            $form->tab('基本设置',function($form){
                $form->text('name','类型名称');
                $form->text('alias','类型别名');
                $form->radio('is_physical','是否为实体商品')->options(['1' => '是', '0'=> '否'])->default('1');
                $form->text('schema_id','供应商编码');
                $form->display('created_at','新建时间');
                $form->display('updated_at','更新时间');
            });
            $form->tab('规格',function($form){
                $form->text();
            });
            $form->tab('价格区间',function($form){
                $form->text();
            });
            $form->tab('扩展属性',function($form){
                $form->text();
            });

        });

    }
}