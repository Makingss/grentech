<?php

namespace App\Http\Controllers\Apis;

use App\User;
use Encore\Admin\Facades\Admin;
use GuzzleHttp\Client as GClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $http;

    public function __construct(GClient $http)
    {
        $this->http = $http;
    }

    /**
     * 登录字段验证
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * 登录实现
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $this->validator($request->all())->validate();
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $user = User::where('email', $email)->where('is_active', 1)->first();
            $oauth_clients = DB::table('oauth_clients')->where('user_id', $user->id)->first();
            if (empty($oauth_clients)) {
                return response()->json(['res' => false, 'req' => '邮箱不存在或者尚未激活']);
            }
            $data = $this->getOauth($oauth_clients->id, md5($user->email . $user->id), $user->email, $password);
            $data['client_id'] = $oauth_clients->id;
            $data['client_secret'] = $oauth_clients->secret;
            return response()->json(['res' => true, 'data' => $data, 'req' => '登录成功']);
        }
        return response()->json(['res' => false, 'req' => '账号或密码错误']);
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

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $validator = Validator::make($credentials, [
            'username' => 'required', 'password' => 'required',
        ]);
        $error = $validator->validate();
        if ($error) {
            return response()->json($error);
        }

        if (Auth::guard('admin')->attempt($credentials)) {

            return response()->json(['res' => true,'data'=>Admin::user(), 'req' => '登录成功']);
        }
        return response()->json(['res' => false, 'req' => '账号或密码错误']);
    }
}
