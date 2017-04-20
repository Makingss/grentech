<?php

namespace App\Admin\Controllers\Members;


use App\Models\Member\MemberLevelModel;
use App\Models\Member\MemberPermissionsModel;
use App\Models\Member\MemberRoles;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\Table;

class UserLevelController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {

        return Admin::content(function (Content $content) {

            $content->header('等级');
            $content->description('设置等级');
//            $content->body($this-
            $content->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $box = new Box('设置权限', $this->grid_roles());
                    $box->collapsable();
                    $box->removable();
                    $box->solid();
                    return $column->append($box);
                });
//                $row->column(6, function (Column $column) {
//                    $box = new Box('设置权限', $this->grid_permissions());
//                    $box->collapsable();
//                    $box->removable();
//                    $box->solid();
//                    return $column->append($box);
//                });
            });

        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid_roles()
    {
        return Admin::grid(MemberLevelModel::class, function (Grid $grid) {

//            $grid->member_lv_id('ID')->sortable();
            $grid->column('name', '等级名称')->display(function ($row) {
                return "<span><img src='https://www.baidu.com/img/bd_logo1.png' width='20px' height='16px' /></span><span>{$row}</span>";
            });
            $grid->point('所需积分');
            $grid->experience('经验');
            $grid->dis_count('会员折扣率');
            $grid->column('more_point','积分倍率');
            $grid->member_permissions('权限')->pluck('name')->label();
            $grid->filter(function ($filter) {
//                $filter->useModal();
                $filter->disableIdFilter();
            });
            $grid->disableExport();
//            $grid->pre_id('上級ID');
        });
    }

    protected function grid_permissions()
    {
        return Admin::grid(MemberPermissionsModel::class, function (Grid $grid) {
//            $grid->member_lv_id('ID')->sortable();
            $grid->column('slug', '规则');
            $grid->column('name', '权限');
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->disableCreation();
            $grid->filter(function ($filter) {
//                $filter->useModal();
                $filter->disableIdFilter();
            });
//            $grid->pre_id('上級ID');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(MemberLevelModel::class, function (Form $form) {

//            $form->display('id', 'ID');
            $form->text('name', '等级名称');
            $form->image('lv_logo', '图标');
            $form->number('dis_count', '会员折扣率')->placeholder('百分比');
            $form->number('point', '所需积分');
            $form->number('more_point','积分倍率');
            $form->number('experience', '经验');
            $form->multipleSelect('member_permissions','权限')->options(MemberPermissionsModel::all()->pluck('name','id'));
//            $form->display('created_at', 'Created At');
//            $form->display('updated_at', 'Updated At');
        });
    }

//    protected function tree()
//    {
//        return MemberPermissionsModel::tree(function (Tree $tree) {
//            $tree->branch(function ($branch) {
//                return $branch['name'];
//            });
//        });
//    }
}
