<?php

namespace App\Admin\Models\Orders;

use App\Admin\Models\Goods\Good;
use App\Admin\Models\Members\Member_addr;
use App\Admin\Models\Members\Member_advance;
use App\Models\Carts\CartObject;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	protected $fillable = ['order_id', 'total_amount', 'final_amount', 'pay_status', 'cardnum', 'ship_status', 'delivery_sign_status', 'received_status',
		'is_delivery', 'received_time', 'last_modified', 'payment', 'shipping_id', 'shipping', 'member_id', 'promotion_type', 'status', 'confirm', 'ship_area',
		'ship_name', 'weight', 'tostr', 'itemnum', 'ip', 'addr_id', 'ship_email', 'ship_time', 'cost_item', 'is_tax', 'tax_type', 'tax_content', 'cost_tax',
		'tax_company', 'is_protect', 'cost_protect', 'cost_payment', 'currency', 'cur_rate', 'score_u', 'score_g', 'discount', 'pmt_goods', 'pmt_order', 'payed',
		'memo', 'disabled', 'displayonsite', 'mark_type', 'mark_text', 'cost_freight', 'extend', 'order_refer', 'addon', 'source', 'is_auto_complete', 'branch_id',
		'branch_name_user', 'staff_id', 'staff_name', 'store_id', 'first_id', 'second_id', 'share_id', 'is_parent', 'first_profit', 'second_profit', 'profit_info',
		'is_fetch', 'another_pay', 'another_member_id', 'another_payinfo', 'is_send_customs',
		'ship_addr', 'ship_zip', 'ship_tel', 'ship_mobile'
	];
//	protected $sumQuantity;

//	public function __construct($sumQuantity = null)
//	{
//		$this->sumQuantity = $sumQuantity;
//	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function member_advance()
	{
		return $this->hasMany(Member_advance::class, 'order_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function member_addrs()
	{
		return $this->belongsTo(Member_addr::class, 'addr_id');
	}

	public function order_items()
	{
		return $this->hasMany(Order_itme::class, 'order_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 * 返回购物车数据
	 */
	public function getSumQuantity($sumQuantity)
	{
		$cartObject = CartObject::whereIn('id', $sumQuantity->cart_id)->get();
		return $cartObject;
	}

	/**
	 * @return mixed
	 * 通过购物车信息，获取商品数据。
	 * 返回订单金额
	 */
	public function getTotalAmounts($sumQuantity)
	{
		$cartObject = $this->getSumQuantity($sumQuantity);
		$goods_ids = $cartObject->map(function ($carts) {
			return $carts->goods_id;
		});
		$goods = Good::whereIn('goods_id', $goods_ids->toArray())->get();
		return $goods->map(function ($good) {
			return $good->mktprice;
		})->sum();
	}

	/**
	 * @param $sumQuantity
	 * @return mixed
	 * 通过购物车信息，获取商品数据
	 * 返回訂单明细信息
	 */
	public function getOrderItems($sumQuantity)
	{
		$cartObject = $this->getSumQuantity($sumQuantity);
		$goods_ids = $cartObject->map(function ($carts) {
			return $carts->goods_id;
		});
		$goods = Good::whereIn('goods_id', $goods_ids->toArray())->get();
		return $goods->map(function ($good) use ($cartObject) {
			foreach ($cartObject->toArray() as $carts) {
				if ((int)$good->goods_id === (int)$carts['goods_id']) {
					return [
						'goods_id' => $good->goods_id,
						'bn' => $good->bn,
						'name' => $good->name,
						'type_id' => $good->type_id,
						'product_id' => $good->product_id ? $good->product_id : 0,
						'price' => $good->mktprice,
						'g_price' => $good->mktprice,
						'amount' => $good->mktprice * $carts['quantity'],
						'nums' => (int)$carts['quantity'],
					];
				}
			}
		});

	}
}
