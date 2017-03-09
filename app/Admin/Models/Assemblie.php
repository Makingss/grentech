<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Assemblie extends Model
{
	protected $table='assemblies';
    protected $fillable=['goods_id','asse_version','asse_high'];

	public function goods(){
		return $this->belongsTo(Good::class,'goods_id');
	}
}
