<?php

namespace App\Admin\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Specification extends Model implements Sortable
{
	use SortableTrait;
	protected $table = 'specification';
	protected $fillable = ['spec_name', 'spec_show_type', 'spec_type', 'spec_memo', 'p_order', 'disabled', 'alias'];
	protected $primaryKey = 'spec_id';
	public $sortable = [
		'order_column_name' => 'p_order',
		'sort_when_creating' => true,
	];

	public function spec_values()
	{
		return $this->hasMany(Spec_value::class, 'spec_id');
	}
}
