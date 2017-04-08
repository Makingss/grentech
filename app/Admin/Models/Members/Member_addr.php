<?php

namespace App\Admin\Models\Members;

use App\Admin\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Member_addr extends Model
{
	protected $fillable = ['member_id', 'name', 'lastname', 'firstname', 'area', 'addr', 'zip', 'tel', 'mobile', 'day', 'time', 'def_addr', 'local_id', 'card_num'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * Many To One
	 * Member_addr.member_id To Member
	 */
	public function member_datas()
	{
		return $this->belongsTo(Member_data::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 * One to One
	 * Member_addr.id To order.addr_id
	 */
	public function orders()
	{
		return $this->hasOne(Order::class, 'addr_id');
	}
}
