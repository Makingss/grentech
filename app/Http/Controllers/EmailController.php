<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
	public function verify($token)
	{
		$user = User::where('confirmation_token', $token)->first();
		if (is_null($user)) {
			//flash 提示
			flash('用户邮箱验证失败！','danger');
			return redirect('/');
		}
		$user->is_active = 1;
		$user->confirmation_token = str_random(40);
		$user->save();
		flash('欢迎回来！','success');
		return redirect('/home');

	}
}
