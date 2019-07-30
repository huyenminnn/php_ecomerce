<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'order_code',
    	'total',
    	'status',
    	'reason_reject',
    	'admin_id',
    	'info_delivery',
    	'delivery_unit',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_code', 'order_code');
    }

    public function infoDelivery()
    {
    	return $this->belongsTo(InfoDelivery::class, 'info_delivery');
    }
}
