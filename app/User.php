<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'is_admin', 'avatar', 'confirmation_token','api_token',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function isAdmin()
	{
		return $this->is_admin === 'Y';
	}

	/**
	 * Route notifications for the mail channel.
	 *Notifications 指定用户接收E-Mail
	 * @return string
	 */
	public function routeNotificationForMail()
	{
		return $this->email;
	}

	public function sendPasswordResetNotification($token)
	{
		// 模板变量
		$bind_data = ['url' => url('/password/reset', $token),
		'name'=>$this->name,
		];
		$template = new SendCloudTemplate('app_reset', $bind_data);

		Mail::raw($template, function ($message) {
			$message->from('wuyanping1029@foxmail.com', 'Making');
			$message->to($this->email);
		});
	}
	
	
}
