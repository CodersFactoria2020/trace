<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UserTrait;
use App\Role;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'dni', 'tutor'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}