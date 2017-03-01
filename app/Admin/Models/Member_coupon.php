<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Member_coupon extends Model
{
    protected $table='member_coupon';
    protected $primaryKey=['memc_code','member_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_coupon.member_id To Member_data.member_id
     */
    public function member_datas(){
        return $this->belongsTo(Member_data::class,'member_id');
    }
}
