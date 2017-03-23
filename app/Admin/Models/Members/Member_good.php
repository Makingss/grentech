<?php

namespace App\Admin\Models\Members;

use App\Admin\Models\Goods\Good;
use Illuminate\Database\Eloquent\Model;

class Member_good extends Model
{
    protected $table = 'member_goods';
    protected $primaryKey = 'gnotify_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_good.goods_id To Good.goods_id
     */
    public function goods()
    {
        return $this->belongsTo(Good::class, 'goods_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_good.member_id To Member_data.member_id
     */
    public function member_datas()
    {
        return $this->belongsTo(Member_data::class, 'member_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_good.product_id To Product.product_id
     */
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function images(){
        return $this->belongsTo('','image_default_id');
    }
}
