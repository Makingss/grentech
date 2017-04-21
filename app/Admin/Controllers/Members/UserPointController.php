<?php

namespace App\Admin\Controllers\Members;

use App\Models\Member\MemberPointConfigure;
use App\Models\Member\MemberPointModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserPointController extends Controller
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

            $content->header('积分创建');

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

            $content->header('积分编辑');

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

            $content->header('积分创建');

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
        return Admin::grid(MemberPointConfigure::class, function (Grid $grid) {

//            $grid->id('ID')->sortable();
            $grid->column('name', '积分名称');
            $grid->column('base', '积分基数');
            $grid->column('expires_in', '积分时长')->display(function ($expires_in) {
                return $expires_in . ' 秒';
            });
            $grid->column('startDate', '开始时间');
            $grid->column('endDate', '结束时间');
            $grid->column('remark', '备注');
//            $grid->disableCreation();
            $grid->column('stime', '剩余时间')->display(function () {

                if (Redis::exists("point_configure_{$this->id}")) {
                    return Redis::ttl("point_configure_{$this->id}");
                }
                return -1;
            })->badge('danger');
            $grid->column('status', '状态')->switch();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(MemberPointConfigure::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '积分名称');
            $form->number('base', '积分基数');
            $form->datetimeRange('startDate', 'endDate', '时间段');
            $form->text('remark', '备注')->placeholder('备注');
            $form->hidden('expires_in');
            $form->hidden('id');
            $form->switch('status', '状态');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function (Form $form) {
                $startToTime = strtotime($form->startDate);
                $endToTime = strtotime($form->endDate);
                $expires_in = (int)($endToTime - $startToTime);
                $form->expires_in = $expires_in;
                if ($expires_in > 0 && $form->status == 'on') {
                    Redis::setex("point_configure_{$form->id}", $expires_in, $expires_in);
                }
            });
        });
    }

}
