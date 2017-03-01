<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['keyname', 'keywordable_id,keywordable_type'];

    public function keywordable()
    {
        return $this->morphTo();
    }
}
