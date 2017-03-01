<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Goods_lv_price extends Model
{
    protected $table = 'goods_lv_price';

//    protected $primaryKey='';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Goods_lv_price To Good
     * Goods_lv_price.goods_id To Goods.goods_id
     */
    public function goods()
    {
        return $this->belongsTo(Good::class, 'goods_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Product To Goods_lv_price
     * Product.product.id To Goods_lv_price.product_id
     */
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_lv To Goods_lv_price
     * Member_lv.member_lv_id To Goods_lv_price.level_id
     */
    public function member_lvs()
    {
        return $this->belongsTo(Member_lv::class, 'member_lv_id');
    }


}
