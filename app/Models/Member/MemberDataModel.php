<?php

namespace App\Models\Member;

use App\Models\AdminUserModel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class MemberDataModel extends Model
{
    use HasApiTokens, Notifiable;
    protected $table = 'member_datas';
    protected $primaryKey = 'member_id';

    /**
     * 获取会员基本信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member_datas()
    {
        return $this->hasOne(AdminUserModel::class, 'id', 'member_id');
    }

    /**
     * 获取积分
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member_point()
    {
        return $this->hasMany(MemberPointModel::class, 'member_id');
    }

    /**
     * 获取用户经验
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member_experience()
    {
        return $this->hasMany(MemberExperienceModel::class, 'member_id');
    }

    public function member_lv()
    {
        return $this->hasOne(MemberLevelModel::class,'id');
    }

    /**
     * 获取用户登录记录
     * @return mixed
     */
    public function member_login()
    {
        return $this->hasMany(MemberLoginModel::class, 'member_id');
    }

    public function member_role_users()
    {
        return $this->hasMany();
    }
}
