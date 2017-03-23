<?php

namespace App\Admin\Models\Ectools;

use App\Admin\Models\Members\Member_advance;
use Illuminate\Database\Eloquent\Model;

class Ectools_payment extends Model
{
    protected $table='ectools_payments';
    protected $primaryKey='payment_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * One To Mant
     * Ectools_payment To Member_advance.payment_id
     */
    public function member_advance(){
        return $this->hasMany(Member_advance::class,'payment_id');
    }
}
