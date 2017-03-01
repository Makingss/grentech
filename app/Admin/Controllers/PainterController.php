<?php

#namespace App\Http\Controllers;
namespace App\Admin\Controllers;

use App\Models\Painter;
use App\Models\Painting;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encore\Admin\Widgets\Tab;

class PainterController extends Controller
{
    use ModelForm;


    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    protected function grid()
    {
        $grids = \Encore\Admin\Facades\Admin::grid(Painter::class, function (Grid $grid) {
            Painting::latest()->completed()->get();
            #dd($grid);
            $grid->filter(function ($filter) {
                $filter->useModal();
                $filter->is('username', 'username');
                $filter->disableIdFilter();
            });
            $grid->id('Id');
            $grid->username('姓名')->editable();
            //$grid->paintings()->pluck('body');
            $grid->paintings('名称')->pluck('title')->map(function ($title) {
                return "<strong><i>《" . $title . "》</i></strong>";
            })->implode('<br/>');
//            $grid->director()->value(function ($id) {
//                return Painting::find($id)->body;
//            });
//            $grid->paintings('内容')->pluck('body')->map(function ($body) {
//                return $body;
//            })->implode('body');
            $grid->created_at('新建时间');
            $grid->updated_at('更新时间');
        });
        return $grids;
    }

    protected function form()
    {
        return \Encore\Admin\Facades\Admin::form(Painter::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('username')->rules('required');
            $form->textarea('bio')->rules('required');
            $form->hasMany('paintings', function (Form\NestedForm $form) {
                $form->text('title')->rules('required');
                $form->textarea('body')->rules('required');
                $form->datetime('completed_at');
            });
            $form->editor('Editor','Text')->default('<img src="/upload/image/Koala.jpg">');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function edit($id)
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * @param $id
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
//        if (Request::input('painter_id') == $id) {
//            throw new \Exception(trans('admin::lang.parent_select_error'));
//        }

        return $this->form()->update($id);
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

}
