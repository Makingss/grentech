<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Models\Members\Member_data;
use App\Events\UserSignUp;
use Naux\Mail\SendCloudTemplate;
use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
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
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
			'captcha' => 'required|captcha',
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
		Member_data::create([
			'member_id' => $user->id,
		]);
		$this->sendVerifyEmailTo($user);
		return $user;
	}

	public function sendVerifyEmailTo($user)
	{
		// 模板变量
		$bind_data = ['url' => route('email.verify', ['token' => $user->confirmation_token]),
			'name' => $user->name
		];
		$template = new SendCloudTemplate('app_register', $bind_data);

		Mail::raw($template, function ($message) use ($user) {
			$message->from('wuyanping1029@foxmail.com', 'Making');
			$message->to($user->email);
		});
	}
}
