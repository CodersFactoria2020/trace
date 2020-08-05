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

    public function createRoles()
    {
        $roles = Role::all();
        $rolesCount = count ($roles);
        $expectedCount = 3;

        if ($rolesCount != $expectedCount)
        {
            factory(Role::class)->create(['name'=>'admin', 'description'=>'Administrador del sitio']);
            factory(Role::class)->create(['name'=>'professional', 'description'=>'Formador de TraCE']);
            factory(Role::class)->create(['name'=>'associated', 'description'=>'Asociado de TraCE']);
        }
        $permission = new Permission();
        $permission->createPermissions();
        
        $professional_permissions = [4,11,12,13,14,15,19,21,22];
        $associated_permissions = [11,14,21,22];
  
        for ($i=1; $i<=3; $i++){
            $role= Role::find($i);
            if($role->name=='professional'){
                $role->permissions()->sync($professional_permissions);
            }
            if($role->name=='associated'){
                $role->permissions()->sync($associated_permissions);
            }
            if ($role->name == 'admin'){
                $permissions=[];
                for ($x=1; $x<=22; $x++){                
                    if(Permission::find($x)){
                        array_push($permissions, $x);
                    }
                }  
                $role->permissions()->sync($permissions);
            }           
        }
    }

}