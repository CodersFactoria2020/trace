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
        'first_name', 'last_name', 'email', 'password', 'phone', 'dni', 'tutor'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function actualRoles()
    {
        $userRoles=[];
        $totalRoles=$this->roles;
        $count=count($totalRoles);
        for ($i=0; $i<$count; $i++) {
            $currentRole=$this->roles[$i]->name;
            array_push($userRoles, $currentRole);
        }
        return $userRoles;
    }

}