<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestProduct extends Model
{
    protected $fillable = [
    	'user_id',
    	'name',
    	'description',
    	'status',
    	'reply',
    	'admin_id',
    ];

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
