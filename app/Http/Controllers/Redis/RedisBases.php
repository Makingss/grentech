<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/25
 * Time: 16:44
 */

namespace App\Http\Controllers\Redis;


use Illuminate\Support\Facades\Redis;

class RedisBases
{
	/**
	 * @param $key
	 * @param $number
	 * @param array $vales
	 * @return mixed
	 */
	public function random($key, $number, array $values)
	{
		Redis::sadd($key, $values);
		$nums = Redis::scard($key);
		if ($nums > 0)
			return Redis::srandmember($key, $number);
	}

	/**
	 * @param $key
	 * @param $values
	 * @return mixed
	 */
	public function getValues($key, $values)
	{
		if (!is_array($values)) {
			Redis::set($key, $values);
			if (Redis::exists($key))
				return Redis::get($key);
		} else {
			Redis::sadd($key, $values);
			$nums = Redis::scard($key);
			if ($nums > 0)
				return Redis::srandmember($key, $nums);
		}
	}

	public function append($key, $values)
	{
		if (Redis::exists($key)) {
			Redis::append($key, $values);
			return Redis::get($key);
		}else{
			return '错误';
		}
	}
}