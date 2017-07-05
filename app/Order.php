<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/6/3
 * Time: 21:46
 */

namespace App;


class Order
{
	protected $products = [];

	public function add(Product $product)
	{
		$this->products[] = $product; 
	}

	public function products()
	{
		return $this->products;
	}

	public function total()
	{
		$total = 0;
		foreach ($this->products as $product) {
			$total += $product->price();
		}

		return $total;

		#$products = collect($this->products);
		#return $products->map(function ($product) use ($total) {
		#	return $total += $product->price();
		#});
	}
}