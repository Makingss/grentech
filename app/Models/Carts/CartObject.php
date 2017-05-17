<?php

namespace App\Models\Carts;

use App\Admin\Models\Goods\Good;
use App\Admin\Models\Images\Image_attach;
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
		return $this->hasOne(Product::class, 'product_id', 'product_id');
	}

	public function getCarts(array $cart_ids)
	{
		$cartObject = CartObject::whereIn('id', $cart_ids)->get();
		$cartGoods = Good::with('cartObjects', 'image_attach', 'images', 'mechanics', 'goods_ports',
			'assemblies', 'standardfits', 'electrics', 'aspect_pics', 'mechanics_inte', 'electrics_inte'
		)->whereIn('goods_id', $cartObject->pluck('goods_id'))->get();//->toArray();
		foreach ($cartGoods as $dataK => $data) {
			foreach ($data['image_attach'] as $itemK => $item) {
				$image_attach = Image_attach::with('images')->where('image_id', $item['image_id'])->get()->toArray();
				$collects = collect($image_attach);
				$collapse = $collects->collapse();
				$cartGoods[$dataK]['image_attach'][$itemK] = $collapse->toArray();
			}
		}
		return $cartGoods;
	}

	/**
	 * @param $query
	 * @param $keyValues
	 * @return mixed
	 * 返回购物车数据
	 */
	public function scopeCarts($query, $keyValues)
	{
		return $query->whereIn('id', $keyValues->cart_id)->get();
	}
}
