<?php

namespace App\Admin\Models\Members;

use App\Admin\Models\Goods\Goods_lv_price;
use Illuminate\Database\Eloquent\Model;

class Member_lv extends Model
{
    protected $table ='member_level';

    /**
     * One To Many
     * Memeber_lv To Goods_lv_price
     * Member_lv.member_lv_id To Goods_lv_price.level_id
     */
    public function goods_lv_price(){
        return $this->hasMany(Goods_lv_price::class,'level_id','id');
    }
}
