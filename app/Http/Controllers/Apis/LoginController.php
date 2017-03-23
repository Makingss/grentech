<?php

namespace App\Http\Controllers\Apis;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

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
            $client_id = DB::table('oauth_clients')->where('user_id', $user->id)->value('id');
            if (empty($client_id)) {
                return response()->json(['res' => false, 'req' => '邮箱不存在或者尚未激活']);
            }
            $res = $this->getOauth($client_id, md5($user->email . $user->id), $user->email, $password);
            return response()->json(['res' => true, 'req' => '登录成功', 'data' => $res]);
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
}
