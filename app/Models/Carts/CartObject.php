<?php

namespace App\Models\Carts;

use App\Admin\Models\Members\Member_data;
use Illuminate\Database\Eloquent\Model;
use Tests\Models\User;

class CartObject extends Model
{
	protected $table = 'cart_objects';
	protected $fillable = ['obj_ident', 'member_ident', 'member_id', 'store_id', 'obj_type', 'params', 'quantity', 'time', 'buy_code', 'buy_url', 'parent_order_id', 'obj_ident'];
	protected $primaryKey = 'obj_ident';
	protected $casts = [
		'params' => 'array'
	];

	public function members()
	{
		$this->belongsTo(Member_data::class, 'member_id');
	}
}
