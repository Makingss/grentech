<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
	protected $table = 'electrics';
	protected $fillable = ['product_id','goods_id','workingband', 'x_beamwidth', 'y_beamwidth', 'beamgain', 'polarization', 'dipangle', 'xpd',
		'ratio', 'inhibition', 'voltagebobbi', 'isolation', 'imd3', 'impedance', 'capacity'
	];

	public function products(){
		return $this->hasOne(Product::class,'product_id');
	}
	public function goods(){
		return $this->belongsTo(Good::class,'goods_id');
	}
}
