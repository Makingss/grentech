<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    protected $fillable = ['username', 'bio'];

    public function Paintings()
    {
        return $this->hasMany(Painting::class, 'painter_id');
    }
}
