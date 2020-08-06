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


    public function createTestingUsers()
    {
        $roles = new Role();
        $roles->createRoles();

        factory(User::class)->create(['first_name' => 'Admin', 'last_name' => 'Ramón y Cajal', 'email' => 'admin@tracecatalunya.org', 'phone' => '+34123456779', 'dni' => '12345778A']);
        factory(User::class)->create(['first_name' => 'Professional', 'last_name' => 'Ramón y Cajal', 'email' => 'pro@tracecatalunya.org', 'phone' => '+34123476789', 'dni' => '17345678A']);
        factory(User::class)->create(['first_name' => 'Associated', 'last_name' => 'Ramón y Cajal', 'email' => 'as@tracecatalunya.org', 'phone' => '+34173456789', 'dni' => '72345678A']);

        $adminRole=1;
        $professionalRole=2;
        $associatedRole=3;

        for ($i=1; $i == 3; $i++){
            if ($i==1){
                $user = User::find($i);
                $user->roles()->sync([$adminRole]);
            }
            if ($i==2){
                $user = User::find($i);
                $user->roles()->sync([$professionalRole]);
            }
            if ($i==3){
                $user = User::find($i);
                $user->roles()->sync([$associatedRole]);
            }
        }
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function getRoleIdAttribute($value)
    {
        if ($value === 1)
        {
            return "Admin";
        }
        if ($value === 2)
        {
            return "Professional";
        }
        if ($value === 3)
        {
            return "Soci";
        }
    }
}