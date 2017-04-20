<?php

namespace App\Models\Member;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class MemberPermissionsModel extends Model
{
    use ModelTree,AdminBuilder;
    //前端会员权限表
    protected $table = 'member_permissions';
//    public function getRole()
//    {
//        return $this->belongsToMany(MemberLevelModel::class, 'member_level_permissions', 'level_id', 'permission_id')->withTimestamps();
//    }

}

