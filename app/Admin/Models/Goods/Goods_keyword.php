<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Goods_keyword extends Model
{
	protected $table = 'good_keyword';
	protected $fillable = ['keyname', 'good_id', 'keyword_id'];


	public function goods()	
	{
		return $this->belongsTo(Good::class, 'good_id');
	}

//    public function keywordable(){
//        return $this->morphTo();
//    }
}
