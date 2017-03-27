<?php

namespace App\Admin\Models\Members;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Member_data extends Model
{
    protected $table = 'member_tatas';
    protected $primaryKey = 'member_id';

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
    public function member_goods(){
        return $this->hasMany(Member_good::class,'goods_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * users.id to member_data.member_id
     */
    public function users(){
        return $this->hasMany(User::class,'id');
    }
}
