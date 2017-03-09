<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Brand extends Model implements Sortable
{
	use SortableTrait;
	protected $table = 'brand';
	protected $fillable = ['brand_name', 'brand_url', 'brand_logo', 'brand_keywords', 'brand_setting', 'disabled', 'ordernum', 'last_modify'];
	protected $primaryKey = 'brand_id';

	public $sortable = [
		'order_column_name' => 'ordernum',
		'sort_when_creating' => true,
	];
	/**
	 * @return mixed
	 * 品牌类型
	 */
	public function goods_types()
	{
		return $this->belongsToMany(Goods_type::class, 'Type_brands', 'brand_id', 'type_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function goods()
	{
		return $this->hasMany(Good::class, 'brand_id');
	}
}
