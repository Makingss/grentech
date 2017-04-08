<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
	protected $fillable = [
		'goods_id',
		'jointtype',
		'antennasize',
		'antennanumber',
		'x_range',
		'antennanweight',
		'guardmode',
		'installmodel',
		'maintainmodel',
		'antennandata',
		'surfacing',
		'antennanageing',
		'temperature',
		'limittemperature',
		'relativehumidity',
		'atmos',
		'speed',
		'limitspeed',
		'thickness',
		'flameretardant',
		'ultraviolet',
		'PH',
		'protect',
		'other',
		'exposed',
		'type',
		'partsdesc',
		'adjustmentrange',
		'workingtemperature',
		'gripdiameter'
	];
	protected $table = 'mechanics';

	public function goods()
	{
		return $this->belongsTo(Good::class, 'goods_id');
	}
}
