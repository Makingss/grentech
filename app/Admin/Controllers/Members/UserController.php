<?php

namespace App\Admin\Controllers\Members;

use App\Models\Member\MemberDataModel;
use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
//        dd(Admin::user()->can('update-post'));
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');
            $content->body($this->grid());
//            $content = new Content();
//            $content->row(function (Row $row) {
//                $row->column(4, function (Column $column) {
//                    $form = new \Encore\Admin\Widgets\Form();
//                    $form->text();
//                    $box = new Box('dsdggggfffffffffffffffffff', $form);
//                    $box->style('danger');
//                    $box->solid();
//                    return $column->append($box);
//                });
//                $row->column(4, function (Column $column) {
//                    $form = new \Encore\Admin\Widgets\Form();
//                    $form->text();
//                    $box = new Box('dsdggggfffffffffffffffffff', $form);
//                    $box->style('danger');
//                    $box->solid();
//                    return $column->append($box);
//                });
//                $row->column(4, function (Column $column) {
//                    $form = new \Encore\Admin\Widgets\Form();
//                    $form->text();
//                    $box = new Box('dsdggggfffffffffffffffffff', $form);
//                    $box->style('danger');
//                    $box->solid();
//                    return $column->append($box);
//                });
//
//            });


            //格栅排版容器
//            $content->row(function ($row){
//                $row->column(6,function (Column $column){
//                    $column->append('123');
//                });
//            });
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
    protected function grid()
    {
        return Admin::grid(MemberDataModel::class, function (Grid $grid) {
//            $grid->id('ID')->sortable();
//            $points=$grid->model()->with('member_point');
            $grid->column('mobile', '手机号');
//            $grid->column('member_datas.name', '用户昵称');
            $grid->column('sex', '性别')->display(function ($sex) {
                $sex = $sex == '2' ? '男' : '女';
                return $sex;
            });

            $grid->column('address', '地址')->display(function () {
                return $this->addr . $this->area;
            })->limit(15);

//            $grid->column('', '个人简介');

            $grid->column('realname', '真实姓名')->display(function () {
                return $this->firstname . $this->lastname;
            });
            $grid->column('birthday', '生日')->display(function () {
                return $this->b_year . '/' . $this->b_month . '/' . $this->b_day;
            });
//            $grid->column('member_datas.avatar');
            $grid->picture('会员头像')->image('member_datas.avatar', 10, 10);

            $grid->column('year', '年龄')->display(function () {
                $birthday = $this->b_year . '/' . $this->b_month . '/' . $this->b_day;
                return Birthday($birthday);
            });
            $grid->column('remark', '备注')->limit(3);


//            $grid->column('member_point[0].point', '积分')->display(function () {
//                $point = collect($this->member_point)->map(function ($point) {
//                    return $point;
//                })->sum('point');
//                $point = collect($this->member_point)->pluck('point')->sum();
//                return $point;
//            });//外键积分表
            $grid->column('member_point.point', '积分')->display(function () {
                $pointMdl = $this->member_point;
                $res = collect($pointMdl)->last();
                return $res['point'];
            });//外键积分表
//            $grid->column('point', '积分');
//            $grid->column('experience', '经验');

            $grid->column('member_experience.experience', '经验')->display(function () {
                $experienceMdl = $this->member_experience;
                $res = collect($experienceMdl)->last();
                return $res['experience'];
            });//外键经验表

            $grid->column('member_lv.name', '等级')->display(function () {
                return $this->member_lv['name'];
            });//外键等级表
            $grid->column('advance', '余额');//外键预支付表
            $grid->member_login('登录记录')->sortByDesc('id')->values()->pluck('location')->first()->badge('danger');//登录记录表
            #$grid->column('', '登录IP');//登录记录IP表
            $collection = collect();
            $count = $collection->count();
//            dd($collection);
            $grid->column('expand', '详情')->electric(function () {

                $memberExperience = collect($this->member_experience)->sortByDesc('id')->forPage(1, 5)->map(function ($map) {
                    return array_only($map, ['experience', 'change', 'remark', 'source', 'created_at']);
                });
                $memberPoint = collect($this->member_point)->sortByDesc('id')->forPage(1, 5)->map(function ($map) {
                    return array_only($map, ['created_at', 'change_point', 'reason', 'point', 'remark']);
                });

                $memberLogin = collect($this->member_login)->sortByDesc('id')->forPage(1, 2)->map(function ($map) {
                    return array_only($map, ['ip', 'location', 'created_at']);
                });

                $tab = new Tab();
//                $memberExperience=$memberExperience->all();
//                dd($memberExperience->values()->all());
                $experienceBox = new Box('经验收入明细', new Table(['经验总数', '支出/收入', '备注', '来源', '日期'], $memberExperience->values()->all() ? $memberExperience->values()->all() : 0));
                $experienceBox->style('info');

//                $gradeBox = new Box('等级增长明细',new Profile([123]));
//                $gradeBox->style('info');
//                $tab->add('等级', $gradeBox);

                $pointBox = new Box('积分明细', new Table(['积分总额', '收入/支出', '来源', '备注', '日期 '], $memberPoint->values()->all() ? $memberPoint->values()->all() : 0));
                $pointBox->style('info');

                $loginBox = new Box('登录记录', new Table(['登录记录', '位置', '日期'], $memberLogin->values()->all() ? $memberLogin->values()->all() : 0));
                $loginBox->style('info');


                $tab->add('经验', $experienceBox);

                $tab->add('积分', $pointBox);


                $ele = $tab->add('登录记录', $loginBox);


                return $ele;
            }, '详情');

//            $grid->d_at();
//            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(MemberDataModel::class, function (Form $form) {
            $form->text('mobile', '手机号');
            $form->select('sex', '性别')->options(['1' => '女', '2' => '男']);
            $form->text('firstname', '姓');
            $form->text('lastname', '名');


            $form->image('member_datas.avatar', '头像');
        });
    }
}
