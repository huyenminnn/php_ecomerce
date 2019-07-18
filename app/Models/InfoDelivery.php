<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoDelivery extends Model
{
    protected $fillable = [
    	'user_id',
    	'username',
    	'address',
    	'mobile',
    	'note',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'info_delivery', 'id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
