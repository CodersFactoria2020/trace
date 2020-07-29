<?php
namespace App\Traits;
use App\Role;

trait UserTrait
{
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

    public function havePermission($permissionRequired)
    {
        foreach ($this->roles as $role)
        {
            foreach ($role->permissions as $actualPermission)
            {
                if ($actualPermission->slug == $permissionRequired)
                {
                    return True;
                }
            }
        }
        return False;
    }
}