<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class MemberLevelModel extends Model
{
    //前端会员等级表
    protected $table = 'member_level';

    public function member_permissions()
    {
        return $this->belongsToMany(MemberPermissionsModel::class, 'member_level_permissions', 'level_id', 'permission_id')->withTimestamps();
    }
}
