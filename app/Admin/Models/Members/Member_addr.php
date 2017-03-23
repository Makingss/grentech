<?php

namespace App\Admin\Models\Members;

use Illuminate\Database\Eloquent\Model;

class Member_addr extends Model
{
    protected $table = 'member_addrs';
    protected $primaryKey='addr_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_addr.member_id To Member
     */
    public function member_datas(){
        return $this->belongsTo(Member_data::class,'member_id');
    }
}
