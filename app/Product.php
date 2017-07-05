<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/6/3
 * Time: 20:39
 */

namespace App;


class Product
{
	protected $name;
	protected $price;

	public function __construct($name, $price)
	{
		$this->name = $name;
		$this->price = $price;
	}

	public function name()
	{
		return $this->name;
	}

	public function price()
	{
		return $this->price;
	}

	public function setDiscount($discount)
	{
		return $this->price = $this->price * ($discount / 10);
	}
}