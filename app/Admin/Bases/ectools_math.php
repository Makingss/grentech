<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/18
 * Time: 15:20
 */

namespace App\Admin\Bases;
	/**
	 * 用于高精度、大数据运算
	 */
/**
 * Class ectools_math
 * @package App\Admin\Bases
 */
class ectools_math
{
	/**
	 * @var int 运算精度
	 */
	public $operationDecimals = 1;   //运算精度
	/**
	 * @var int 运算进位方式
	 */
	public $operationCarryset = 1;   //运算进位方式
	/**
	 * @var int 运算显示精度
	 */
	public $goodsShowDecimals = 1;   //运算显示精度
	/**
	 * @var int 运算显示进位方式
	 */
	public $goodsShowCarryset = 1;     //运算显示进位方式
	/**
	 * @var string 运算function
	 */
	public $operationFunc = null;    //运算function
	/**
	 * @var string 显示function
	 */
	public $displayFunc = null;   //显示function

	public function __construct()
	{    /*
		$this->operationDecimals = app::get('ectools')->getConf('site.decimal_digit.count');            //运算精度
		$this->operationCarryset = app::get('ectools')->getConf('site.decimal_type.count');            //运算进位方式
		$this->goodsShowDecimals = app::get('ectools')->getConf('site.decimal_digit.display');            //运算显示精度
		$this->goodsShowCarryset = app::get('ectools')->getConf('site.decimal_type.display');            //运算显示进位方式

		switch ($this->operationCarryset) {
			case "1":          //四舍五入
				$this->operationFunc = 'round';
				break;
			case "2":          //向上取整
				$this->operationFunc = 'ceil';
				break;
			case "3":          //向下取整
				$this->operationFunc = 'floor';
				break;
			default:          //四舍五入
				$this->operationFunc = 'round';
				break;
		}

		switch ($this->goodsShowCarryset) {
			case "1":          //四舍五入
				$this->displayFunc = 'round';
				break;
			case "2":          //向上取整
				$this->displayFunc = 'ceil';
				break;
			case "3":          //向下取整
				$this->displayFunc = 'floor';
				break;
			default:          //四舍五入
				$this->displayFunc = 'round';
				break;
		}
	*/
	}

	/**
	 * 相加运算
	 * @params array - or string
	 * @return 运算结果
	 */
	public function number_plus($numbers = '')
	{
		// 异常处理
		if ($numbers === null) {
			trigger_error(app::get('ectools')->_("参数不能为空！"), E_USER_ERROR);
			exit;
		}
		// 开始运算
		if (!is_array($numbers))
			return $this->getOperationNumber($numbers, true);

		$rs = 0;
		foreach ($numbers as $n) {
			$n = trim($n);
			if (function_exists("bcadd"))
				$rs = bcadd(strval($rs), strval($n), 3);
			else {
				if (is_null($rs) || $rs === '' || $rs === 0)
					$rs = '0';
				if (is_null($n) || $n === '' || $n === 0)
					$n = '0';

				$sql = "SELECT " . strval($rs) . " + " . strval($n) . " AS nums";

				try {
					$row = kernel::database()->select($sql);
					$rs = $row[0]['nums'];
				} catch (Exception $e) {
					trigger_error($sql . ':' . $e->getMessage(), E_USER_WARNING);
					exit;
				}
			}
		}

		return $this->getOperationNumber($rs, true);
	}
}