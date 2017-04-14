<?php

namespace App\Models\Carts;

use App\Admin\Models\Goods\Good;
use App\Admin\Models\Members\Member_data;
use App\Admin\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Tests\Models\User;

class CartObject extends Model
{
	protected $table = 'cart_objects';
	protected $fillable = ['obj_ident', 'member_ident', 'goods_id', 'product_id', 'member_id', 'store_id', 'obj_type', 'params', 'quantity', 'time', 'buy_code', 'buy_url', 'parent_order_id'];
	protected $casts = [
		'params' => 'array'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function members()
	{
		return $this->belongsTo(Member_data::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function goods()
	{
		return $this->hasOne(Good::class, 'goods_id', 'goods_id');
	}

	public function products()
	{
		return $this->hasOne(Product::class,'product_id','product_id');
	}
}
