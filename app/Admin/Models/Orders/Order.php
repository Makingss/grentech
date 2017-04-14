<?php

namespace App\Admin\Models\Orders;

use App\Admin\Models\Members\Member_addr;
use App\Admin\Models\Members\Member_advance;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';

	protected $fillable = ['order_id', 'total_amount', 'final_amount', 'pay_status', 'cardnum', 'ship_status', 'delivery_sign_status', 'received_status',
		'is_delivery', 'received_time', 'last_modified', 'payment', 'shipping_id', 'shipping', 'member_id', 'promotion_type', 'status', 'confirm', 'ship_area',
		'ship_name', 'weight', 'tostr', 'itemnum', 'ip', 'addr_id', 'ship_email', 'ship_time', 'cost_item', 'is_tax', 'tax_type', 'tax_content', 'cost_tax',
		'tax_company', 'is_protect', 'cost_protect', 'cost_payment', 'currency', 'cur_rate', 'score_u', 'score_g', 'discount', 'pmt_goods', 'pmt_order', 'payed',
		'memo', 'disabled', 'displayonsite', 'mark_type', 'mark_text', 'cost_freight', 'extend', 'order_refer', 'addon', 'source', 'is_auto_complete', 'branch_id',
		'branch_name_user', 'staff_id', 'staff_name', 'store_id', 'first_id', 'second_id', 'share_id', 'is_parent', 'first_profit', 'second_profit', 'profit_info',
		'is_fetch', 'another_pay', 'another_member_id', 'another_payinfo', 'is_send_customs'
	];

//	public function __construct(array $attributes)
//	{
//		parent::__construct($attributes);
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

	

}
