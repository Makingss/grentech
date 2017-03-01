<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Goods_keyword extends Model
{
    protected $table='goods_keywords';
    protected $fillable = ['goods_id', 'keyword', 'refer', 'res_type', 'last_modify'];

    public function goods()
    {
        return $this->belongsTo('App\Model\Good', 'goods_id');
    }
}
