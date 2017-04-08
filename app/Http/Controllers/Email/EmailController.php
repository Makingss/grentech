<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class EmailController extends Controller
{
	public function verify($token)
	{
		$user = User::where('confirmation_token', $token)->first();
		if (is_null($user)) {
			//flash 提示
			flash('用户邮箱验证失败！', 'danger');
			return redirect('/');
		}
		$this->create($user->id, $user->email, $user->email, '');
		$user->is_active = 1;
		$user->confirmation_token = str_random(40);
		$user->save();
		flash('欢迎回来！', 'success');
		return redirect('/home');

	}

	public function create($userId, $name, $secret, $redirect, $personalAccess = false, $password = true)
	{
		$client = (new Client())->forceFill([
			'user_id' => $userId,
			'name' => $name,
			'secret' => md5($secret.$userId),
			'redirect' => $redirect,
			'personal_access_client' => $personalAccess,
			'password_client' => $password,
			'revoked' => false,
		]);

		$client->save();
		return $client;
	}
}
