<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
    	'product_id',
    	'price',
    	'size',
    	'quantity',
    	'color',
    	'description',
    ];

    public function orderDetail()
    {
    	return $this->hasMany(OrderDetail::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
