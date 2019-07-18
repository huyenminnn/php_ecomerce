<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessengerDetail extends Model
{
    protected $fillable = [
    	'mess_id',
    	'admin_id',
    	'content',
    	'status',
    ];

    public function messenger()
    {
    	return $this->belongsTo(Messenger::class, 'mess_id', 'id');
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }
}
