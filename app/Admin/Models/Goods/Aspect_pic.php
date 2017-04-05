<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Aspect_pic extends Model
{
    protected $fillable=['electric_id','title','pic_url'];

	public function goods(){
		return $this->belongsTo(Good::class,'goods_id');
	}

	public function electrics(){
		return $this->belongsTo(Electric::class);
	}
}
