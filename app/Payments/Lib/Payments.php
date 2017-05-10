<?php

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/26
 * Time: 11:34
 */
class Payments
{
	/**
	 * @var array attribute
	 * 设置属性
	 */
	protected $attribute = [];
	/**
	 * @var array
	 * 设置支持货币
	 */
	protected $paymentCurrency = [];

	public function __construct()
	{
	}

	/**
	 * 支付数据在传递到提交支付动作，中间通过签名的方式做数据校验，防止随意篡改金额等数据提交
	 * @return string - 公约的签名方式
	 */
	protected function generateSign()
	{

	}

	/**
	 * 获取管理后台配置
	 */
	protected function getConfig()
	{

	}

	/**
	 * 设置属性
	 */
	protected function setAttribute()
	{

	}
}