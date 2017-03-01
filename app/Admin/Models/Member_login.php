<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Member_login extends Model
{
    protected $table = 'member_logins';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_login To Member_data
     */
    public function member_datas()
    {
        return $this->belongsTo(Member_data::class, 'member_id');
    }
}
