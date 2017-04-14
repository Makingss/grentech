<?php

namespace App\Admin\Models\Products;

use App\Admin\Models\Goods\Electric;
use App\Admin\Models\Goods\Good;
use App\Admin\Models\Goods\Goods_lv_price;
use App\Admin\Models\Members\Member_good;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	protected $fillable = ['jooge_product_id', 'goods_id', 'barcode', 'title', 'bn', 'price', 'cost', 'mktprice',
		'name', 'weight', 'g_weight', 'unit', 'store', 'store_place', 'freez', 'goods_type', 'spec_info',
		'spec_desc', 'is_default', 'qrcode_image_id', 'uptime', 'last_modify', 'disabled', 'marketable'
	];

	public function Goods()
	{
		return $this->belongsTo(Good::class, 'goods_id');
	}

	/**
	 * One To Many
	 * Product To Goods_lv_price
	 * Product.product_id To Goods_lv_price
	 */
	public function goods_lv_prices()
	{
		return $this->hasMany(Goods_lv_price::class, 'product_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Product.product_id To Member_good.product_id
	 */
	public function member_goods()
	{
		return $this->hasMany(Member_good::class, 'product_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function electrics()
	{
		return $this->belongsTo(Electric::class, 'product_id');
	}

//	public function cartObjects()
//	{
//
//	}

}
