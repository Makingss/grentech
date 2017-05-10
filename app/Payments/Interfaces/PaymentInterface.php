<?php
//namespace App\Payments\Interfaces;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/26
 * Time: 10:19
 */
interface PaymentInterface
{
	/**
	 * 显示支付接口后台的信息
	 * 显示的信息 HTML 格式
	 * @return string
	 */
	public function adminInfo();

	/**
	 * 设置后台的显示项目
	 * @return array 配置的表单项
	 */
	public function setting();

	/**
	 * 前台在支付例表相对应项目的说明
	 * @return string HTML 格式
	 */
	public function intro();

	/**
	 * 提交支付的表单数据
	 * $params 提交的表单全部数据参数
	 * @return HTML XML - 提交的表单
	 */
	public function toPay($payments);

	/**
	 * 支付后并且返回后的处理事件动作
	 * params 所有返回的参数
	 * @return HTML XML -返回給到第三方支付回应
	 */
	public function callback($callback);

	/**
	 * 验证提交的支付数据的正确性
	 *
	 * @return boolean
	 */
	public function validationData();

	/**
	 * 生成支付表单 - 自动提交(点击链接提交的那种方式，通常用于支付方式列表)
	 * @params null
	 * @return null
	 */
	public function generateForm();


}