<?php

namespace App\Admin\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Goods_port extends Model
{
	protected $fillable = ['goods_id', 'spec', 'ports_1', 'ports_2', 'ports_3', 'ports_4', 'ports_5', 'ports_6', 'ports_7', 'ports_8',
		'ports_9', 'ports_10', 'ports_11', 'ports_12', 'ports_13', 'ports_14', 'ports_15', 'ports_16', 'ports_17', 'ports_18', 'ports_19', 'ports_20',
		'ports_21', 'ports_22', 'ports_23', 'ports_24', 'ports_25'
	];

	public function goods()
	{
		return $this->belongsTo(Good::class, 'goods_id');
	}

	public function setSpecAttribute($options)
	{
		if (is_array($options)) {
			$this->attributes['spec'] = join(',', $options);
		}
	}

	public function getSpecAttribute($options)
	{
		if (is_string($options)) {
			return explode(',', $options);
		}

		return $options;
	}
}
