<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'mobile',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function infoDeliveries()
    {
        return $this->hasMany(InfoDelivery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function messengers()
    {
        return $this->hasMany(Messenger::class);
    }

    public function suggestProducts()
    {
        return $this->hasMany(SuggestProducts::class);
    }
}
