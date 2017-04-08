<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/4/1
 * Time: 10:13
 */

namespace App\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class Order_itme extends Model
{
	protected $primaryKey = 'item_id';
	protected $fillable = ['order_id', 'parent_order_id', 'obj_id', 'product_id', 'goods_id', 'type_id', 'bn', 'name',
		'cost', 'price', 'g_price', 'amount', 'score', 'weight', 'nums', 'sendnum', 'addon', 'is_opinions', 'is_comment', 'item_type',
		'aftersale_status', 'buy_code', 'buy_url', 'user_cancel_status'
	];

	public function orders()
	{
		return $this->belongsTo(Order::class, 'order_id');
	}

}