<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    protected $fillable = ['role_name']; 

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class);
    }
}