<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Naux\Mail\SendCloudTemplate;
use Mail;
use App\User;
use Illuminate\Support\Arr;
use GuzzleHttp\Client as GClient;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    //Api注册类
    use DispatchesJobs, ValidatesRequests;
    protected $http;

    public function __construct(GClient $http)
    {
        $this->http = $http;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'confirmation_token' => str_random(40),
            'avatar' => '/uploads/image/default/Koala.jpg',
            'password' => bcrypt($data['password']),
            'api_token' => str_random(60),
            'is_admin' => 'N',
        ]);
        $this->sendVerifyEmailTo($user, $data['password']);
        return $user;
    }

    /**
     * 验证邮箱发送实例
     * @param object $user
     * @param string $key
     * @
     */
    public function sendVerifyEmailTo($user, $key)
    {
        //设置邮箱验证API路由
        $urlObj = redirect('/app#/jump?token=' . $user->confirmation_token . '&secret=' . authcode($key, 'ENCODE'));
        $bind_data = ['url' => $urlObj->getTargetUrl(), 'name' => $user->name];
//        $bind_data = ['url' => route('api.email.verify', ['token' => $user->confirmation_token, 'secret' => authcode($key, 'ENCODE')]),
//            'name' => $user->name
//        ];
        $template = new SendCloudTemplate('app_register', $bind_data);

        Mail::raw($template, function ($message) use ($user) {
            $message->from('wuyanping1029@foxmail.com', 'Making');
            $message->to($user->email);
        });
    }

    /**
     * 注册实现
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return response()->json(['res' => true, 'data' => $user, 'req' => '注册成功']);
    }

    /**
     * api注册验证
     * @param $token mixed confirmation_token
     * @param $secret mixed secret
     * @return string ;
     */
    public function registerVerify($token, $secret)
    {
        $user = User::where('confirmation_token', $token)->first();
        if (is_null($user)) {
            return response()->json(['res' => false, 'data' => null, 'req' => '激活失败']);
        }
        $this->oauthClientCreate($user->id, $user->email, $user->email, '');
        $id = DB::table('oauth_clients')->where('user_id', $user->id)->value('id');
        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $res = $user->save();
        if ($res) {
            $data = $this->getOauth($id, md5($user->email . $user->id), $user->email, authcode($secret));
            return response()->json(['res' => true, 'data' => $data, 'req' => '激活成功']);
        }
        return response()->json(['res' => true, 'data' => '', 'req' => '数据存储失败请重试']);
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
        $client = (new Client())->forceFill([
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
     * 获取oauth授权基本新
     * @param integer $client_id 客户端ID
     * @param string $client_secret 客户端secret_id
     * @param string $username 用户名
     * @param string $password 密码
     * @param string $scope 作用域
     * @return mixed
     */
    public function getOauth($client_id, $client_secret, $username, $password, $scope = '')
    {
        $response = $this->http->post(url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'username' => $username,
                'password' => $password,
                'scope' => $scope,
            ],
        ]);
        return json_decode((string)$response->getBody(), true);
    }
}
