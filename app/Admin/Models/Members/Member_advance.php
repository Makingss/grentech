<?php

namespace App\Admin\Models\Members;

use App\Admin\Models\Ectools\Ectools_payment;
use App\Admin\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Member_advance extends Model
{
    protected $table = 'member_advance';
    protected $primaryKey = 'log_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_advance To Member_data
     */
    public function member_datas()
    {
        return $this->belongsTo(Member_data::class, 'member_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_advance.payment_id To Ectools_payment.payment_id
     */
    public function ectools_payments()
    {
        return $this->belongsTo(Ectools_payment::class, 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Many To One
     * Member_advance.order_id To Order.order_id
     */
    public function orders(){
        return $this->belongsTo(Order::class,'payment_id');
    }
}
