<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Standardfit extends Model
{
	protected $fillable = ['goods_id', 'bracket', 'expansionbolt', 'hexagonbolt', 'lightning'];

	public function goods()
	{
		return $this->belongsTo(Good::class, 'goods_id');
	}
}
