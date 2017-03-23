<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='order_id';

    public function member_advance(){
        return $this->hasMany(Member_advance::class,'order_id');
    }
}
