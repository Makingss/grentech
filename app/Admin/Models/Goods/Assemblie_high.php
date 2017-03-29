<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/28
 * Time: 16:42
 */

namespace App\Admin\Models\Goods;


use Illuminate\Database\Eloquent\Model;

class Assemblie_high extends Model
{
	protected $fillable = ['asse_high'];

	public function goods()
	{
		$this->morphToMany(Good::class, 'goodsassemblie');
	}
}