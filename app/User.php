<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'dni', 'tutor', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function filterByRole($id)
    {
        $users = User::where('role_id', '=', $id)->get();
        return $users;
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function getRoleIdAttribute($value)
    {
        if ($value === 1)
        {
            return "Soci";
        }
        if ($value === 2)
        {
            return "Professional";
        }
        if ($value === 3)
        {
            return "Admin";
        }
    }
}