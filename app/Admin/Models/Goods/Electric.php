<?php

namespace App\Admin\Models\Goods;

use App\Admin\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
	protected $table = 'electrics';
	protected $fillable = ['type', 'product_id', 'goods_id', 'workingband', 'x_beamwidth', 'y_beamwidth', 'beamgain', 'polarization', 'dipangle', 'xpd',
		'ratio', 'inhibition', 'voltagebobbi', 'isolation', 'imd3', 'impedance', 'capacity',
		'dipangleaccuracy', 'calibration_1', 'calibration_2', 'calibration_3', 'calibration_4', 'withcalibration_1', 'withcalibration_2', 'withcalibration_3',
		'differentcalibration_1', 'differentcalibration_2', 'differentcalibration_3', 'cellbeam_1', 'cellbeam_2', 'cellbeam_3', 'cellbeam_4', 'cellbeam_5', 'cellbeam_6',
		'cellbeam_7', 'cellbeam_8', 'radiobeam_1', 'radiobeam_2', 'radiobeam_3', 'radiobeam_4', 'radiobeam_5', 'radiobeam_6', 'radiobeam_7', 'radiobeam_8', 'radiobeam_9', 'radiobeam_10',
		'businessbeam_1', 'businessbeam_2', 'businessbeam_3', 'businessbeam_4', 'businessbeam_5', 'businessbeam_6', 'businessbeam_7', 'businessbeam_8', 'unitport', 'calibrationport',
		'pictures'

	];

	public function products()
	{
		return $this->hasOne(Product::class, 'product_id');
	}

	public function goods()
	{
		return $this->belongsTo(Good::class, 'goods_id');
	}

	public function setPicturesAttribute($pictures)
	{
		if (is_array($pictures)) {
			$this->attributes['pictures'] = json_encode($pictures);
		}
	}

	public function getPicturesAttribute($pictures)
	{
//		dd($pictures);
		return json_decode($pictures, true);

	}
}
