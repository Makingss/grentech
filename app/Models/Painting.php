<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Query;

class Painting extends Model
{
    protected $fillable = ['painter_id', 'title', 'body', 'completed_at'];
    protected $dates = ['completed_at'];

    public function painter()
    {
        return $this->belongsTo(Painter::class, 'painter_id');
    }

    public function setCompleterAtAttribute($date)
    {
        $this->attributes['completed_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopeCompleted($query)
    {
        $query->where('completed_at', '<=', Carbon::now());
    }
}
