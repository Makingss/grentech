<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Model;

class China_area extends Model
{

	public function parent()
	{
		return $this->belongsTo(China_area::class, 'parent_id');
	}

	public function children()
	{
		return $this->hasMany(China_area::class, 'parent_id');
	}

	public function brothers()
	{
		return $this->parent->children();
	}

	public static function options($id)
	{
		if (!$self = static::find($id)) {
			return [];
		}

		return $self->brothers()->pluck('name', 'id');
	}
}
