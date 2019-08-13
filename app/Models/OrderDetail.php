<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
    	'order_code',
    	'product_detail_id',
    	'quantity',
    	'total',
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_code', 'order_code');
    }

    public function productDetail()
    {
    	return $this->belongsTo(ProductDetail::class);
    }
}
