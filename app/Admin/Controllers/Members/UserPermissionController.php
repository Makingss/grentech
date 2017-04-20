<?php

namespace App\Admin\Controllers\Members;

use App\Models\Member\MemberPermissionsModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserPermissionController extends Controller
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

            $content->header('设置权限');

            $content->body($this->grid());
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

            $content->header('修改权限');

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

            $content->header('创建权限');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(MemberPermissionsModel::class, function (Grid $grid) {

            $grid->column('slug', '规则');
            $grid->column('name', '权限');
            $grid->disableExport();
            $grid->disableRowSelector();
//            $grid->disableCreation();
            $grid->filter(function ($filter) {
//                $filter->useModal();
                $filter->disableIdFilter();
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(MemberPermissionsModel::class, function (Form $form) {
            $form->text('slug', '规则命名');
            $form->text('name', '权限名称');
        });
    }
}
