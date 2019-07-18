<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = [
    	'user_id',
    	'status',
    ];

    public function messengerDetails()
    {
        return $this->hasMany(MessengerDetail::class, 'mess_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
