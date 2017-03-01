<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';
    protected $fillable = ['brand_name', 'brand_url', 'brand_logo', 'brand_keywords', 'brand_setting', 'disabled', 'p_order', 'last_modify'];
    protected $primaryKey = 'brand_id';

    /**
     * @return mixed
     * 品牌类型
     */
    public function goods_types()
    {
        return $this->belongsToMany(Goods_type::class, 'Type_brands', 'brand_id', 'type_id');
    }
}
