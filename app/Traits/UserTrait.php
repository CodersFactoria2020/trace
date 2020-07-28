<?php
namespace App\Traits;
use App\Role;

trait UserTrait{

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user'); 
    }

    public function havePermission($permission_slug){
        foreach($this->roles as $role){
            if ($role['name']=='admin'){
                return true;
            }
            foreach ($role->permissions as $permission){
                if ($permission->slug == $permission_slug){
                    return true;
                }
            }           
        }
        return false;
    }
}