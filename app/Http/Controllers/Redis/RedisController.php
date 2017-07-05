<?php

namespace App\Http\Controllers\Redis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
	public function index()
	{
		$key = 'redis:get02';
		$getValues ='Hello';
		$values = ' World';
		$num = 2;
		#return app('RedisBases')->random($key,$num,$values);
		app('RedisBases')->getValues($key, $getValues);
		return app('RedisBases')->append($key, $values);
	}

}
