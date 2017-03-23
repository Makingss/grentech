<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Goods_type extends Model
{
    protected $table='goods_type';
    protected $fillable = ['name', 'alias', 'is_physical', 'schema_id', 'setting',
        'price', 'minfo', 'params', 'tab', 'dly_func', 'ret_func', 'reship', 'disabled', 'is_def',
        'schema_lastmodify'
    ];

    protected $primaryKey = 'type_id';

    public function Goods()
    {
        return $this->hasMany(Good::class, 'type_id');
    }

    public function Goods_cats()
    {
        return $this->hasMany(Goods_cat::class, 'type_id');
    }

}
