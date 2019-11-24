<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // pt = payment type
    const PT_OFFLINE = 'offline';
    const PT_ONLINE = 'online';
    // ps = payment Status
    const PS_PAID = 'paid';
    const PS_UNPAID = 'unpaid';

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_DECLINED = 'declined';

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
