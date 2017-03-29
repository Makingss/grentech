<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/3/28
 * Time: 16:40
 */

namespace App\Admin\Models\Goods;


use Illuminate\Database\Eloquent\Model;

class Assemblie_version extends Model
{
	protected $table = 'assemblie_version';
	protected $fillable = ['asse_version'];

	public function goods()
	{
		$this->morphToMany(Good::class, 'goodsassemblie');
	}
}