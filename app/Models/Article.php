<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
		'title',
		'content',
		'published_at',
		'reads'
	];
	protected $dates = ['published_at'];

	/**
	 * @param $data
	 * 使用了setAttribute
	 */
	public function setPublishedAtAttribute($data)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $data);
	}

	/**
	 * @param $query
	 * 使用了QueryScope
	 */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	/**
	 * 点赞率最高的文章
	 */
	public function scopeTrending($query)
	{
		return $query->orderBy('reads', 'desc')->get();
	}
}
    
