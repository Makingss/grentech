<?php

namespace App\Admin\Models\Ectools;

use App\Admin\Models\Goods\Good;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

	protected $fillable = ['keyname', 'refer', 'res_type', 'last_modify','created_at','updated_at'];

//	public function goods()
//	{
//		return $this->belongsToMany(Good::class, 'good_keyword')->withTimestamps();//, 'keyword_id', 'good_id'
//	}
}
