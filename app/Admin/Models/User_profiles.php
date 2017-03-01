<?php

namespace App\Admin\Models;

use App\Model\Auth\Administrator;
use App\User;
use Illuminate\Database\Eloquent\Model;

class User_profiles extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function administrator(){
        return $this->belongsTo(Administrator::class);
    }
}
