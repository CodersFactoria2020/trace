<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    protected $fillable = ['name'];

    static $admin_id = 3;
    static $professional_id = 2;
    static $soci_id = 1;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
