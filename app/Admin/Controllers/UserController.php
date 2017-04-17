<?php

namespace App\Admin\Controllers;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ModelForm;
    protected $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
//        $this->update_member_oauth();
        return Admin::content(function (Content $content) {
            $content->header(trans('admin::lang.administrator'));
            $content->description(trans('admin::lang.list'));
            $content->body($this->grid()->render());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(trans('admin::lang.administrator'));
            $content->description(trans('admin::lang.edit'));
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
            $content->header(trans('admin::lang.administrator'));
            $content->description(trans('admin::lang.create'));
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
        return Administrator::grid(function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->username(trans('admin::lang.username'));
            $grid->name(trans('admin::lang.name'));
            $grid->roles(trans('admin::lang.roles'))->pluck('name')->label();
            $grid->created_at(trans('admin::lang.created_at'));
            $grid->updated_at(trans('admin::lang.updated_at'));

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if ($actions->getKey() == 1) {
                    $actions->disableDelete();
                }
            });

            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });

            $grid->disableExport();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Administrator::form(function (Form $form) {
            $form->display('id', 'ID');

            $form->text('username', trans('admin::lang.username'))->rules('required');
            $form->text('name', trans('admin::lang.name'))->rules('required');
            $form->image('avatar', trans('admin::lang.avatar'));
            $form->password('password', trans('admin::lang.password'))->rules('required|confirmed');
            $form->password('password_confirmation', trans('admin::lang.password_confirmation'))->rules('required')
                ->default(function ($form) {
                    return $form->model()->password;
                });

            $form->ignore(['password_confirmation']);

            $form->multipleSelect('roles', trans('admin::lang.roles'))->options(Role::all()->pluck('name', 'id'));
            $form->multipleSelect('permissions', trans('admin::lang.permissions'))->options(Permission::all()->pluck('name', 'id'));

            $form->display('created_at', trans('admin::lang.created_at'));
            $form->display('updated_at', trans('admin::lang.updated_at'));
//            dd($form->text('username'));
//            dd($form);
            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }

    public function store(Request $request)
    {
//        $this->form()->store();
        $form = $this->form();

        $data = $request->all();
        // Handle validation errors.
        if ($validationMessages = $form->validationMessages($data)) {
            return back()->withInput()->withErrors($validationMessages);
        }
        if (($response = $form->prepare($data)) instanceof Response) {
            return $response;
        }
        DB::transaction(function () use ($form) {
            $inserts = $form->prepareInsert($form->updates);

            foreach ($inserts as $column => $value) {
                $form->model->setAttribute($column, $value);
            }

            $form->model->save();
            $user = $form->model;
            $this->oauthClientCreate($user->id, $user->username, $user->username, '');
            $form->updateRelation($this->form()->relations);
        });

        if (($response = $form->complete($form->saved)) instanceof Response) {
            return $response;
        }

        if ($response = $form->ajaxResponse(trans('admin::lang.save_succeeded'))) {
            return $response;
        }

        return $form->redirectAfterStore();
    }


    /**
     * 重写Oauth的客户端创建
     * @param integer $userId 用户ID
     * @param string $name 用户名
     * @param string $secret secret_id
     * @param string $redirect 回调地址
     * @param bool $personalAccess 是否私钥
     * @param bool $password 是否公钥
     * @return mixed
     */
    public function oauthClientCreate($userId, $name, $secret, $redirect, $personalAccess = false, $password = true)
    {
        $client = (new \Laravel\Passport\Client())->forceFill([
            'user_id' => $userId,
            'name' => $name,
            'secret' => md5($secret . $userId),
            'redirect' => $redirect,
            'personal_access_client' => $personalAccess,
            'password_client' => $password,
            'revoked' => false,
        ]);

        $client->save();
        return $client;
    }

    /**
     * 临时方法用于同步更新admin_user和oauth_clients表的数据
     */
    private function update_member_oauth()
    {
        $res = DB::table('admin_users')->leftJoin('oauth_clients', 'oauth_clients.user_id', '=', 'admin_users.id')->get(['admin_users.id', 'admin_users.username', 'oauth_clients.user_id'])->where('user_id', '=', null)->toArray();
        if (!empty($res)) {
            foreach ($res as $key => $val) {
                $this->oauthClientCreate($val->id, $val->username, $val->username, '');
            }
        }
    }
}
