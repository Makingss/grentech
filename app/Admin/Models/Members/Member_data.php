<?php

namespace App\Admin\Models\Members;

use App\Models\Carts\CartObject;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Member_data extends Model
{
	protected $table = 'member_datas';
	protected $primaryKey = 'member_id';
	protected $fillable = ['member_id', 'member_lv_id', 'member_agency_id', 'first_agency', 'second_agency', 'third_agency', 'four_agency', 'crm_member_id',
		'jooge_member_id', 'name', 'point', 'lastname', 'firstname', 'area', 'addr', 'mobile', 'tel', 'email', 'zip', 'info', 'wxname', 'order_num', 'refer_id',
		'refer_url', 'b_year', 'b_month', 'b_day', 'sex', 'addon', 'wedlock', 'education', 'vocation', 'interest', 'advance', 'advance_freeze', 'point_freeze',
		'score_rate', 'reg_ip', 'point_history', 'regtime', 'state', 'pay_time', 'biz_money', 'fav_tags', 'custom', 'cur', 'lang', 'unreadmsg', 'disabled',
		'remark', 'remark_type', 'login_count', 'experience', 'foreign_id', 'resetpwd', 'resetpwdtime', 'cover', 'member_refer', 'source', 'pay_password'
		, 'member_type', 'agency_no', 'offline_cardno', 'follow_num', 'fans_num', 'opinions_num', 'praise_num', 'source_app', 'queit', 'invite_mem_fid',
		'quarterly_sales', 'total_sales', 'completion_rate', 'token', 'referrals_code', 'invite_mem_nums', 'is_invite', 'is_openinfo', 'is_withdrawal',
		'shop_cover'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Member_data.member_id To Member_login.member_id
	 */
	public function member_logins()
	{
		return $this->hasMany(Member_login::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Member_data To Member_addr
	 */
	public function member_addrs()
	{
		return $this->hasMany(Member_addr::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Member_data To Member_advance
	 */
	public function member_advances()
	{
		return $this->hasMany(Member_advance::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Member_data.member_id To Member_coupons.member_id
	 */
	public function member_coupons()
	{
		return $this->hasMany(Member_coupon::class, 'member_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * One To Many
	 * Member_data.member_id To Member_good.member_id
	 */
	public function member_goods()
	{
		return $this->hasMany(Member_good::class, 'goods_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * users.id to member_data.member_id
	 */
	public function users()
	{
		return $this->belongsTo(User::class, 'id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 * member_data.member_id To cartObject.member_id
	 */
	public function cartObjects()
	{
		return $this->hasMany(CartObject::class, 'member_id');
	}
}
