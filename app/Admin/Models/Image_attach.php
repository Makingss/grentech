<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Image_attach extends Model
{
    protected $table='image_attach';
    protected $primaryKey='attach_id';

    protected $fillable=['target_id','target_type','image_id','last_modified'];
    public function goods(){
        return $this->belongsTo(Good::class,'goods_id');
    }

    public function images(){
        return $this->hasOne(Image::class,'image_id','image_id');
    }
}
