<?php
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
      $professional_permissions = [4,11,12,13,14,15,19,21,22];
      $associated_permissions = [11,14,21,22];

        for ($i=2; $i<=30; $i++){
            if (Role::find($i)){
                $role= Role::find($i);
                if($role->name=='professional'){
                    $role->permissions()->sync($professional_permissions);
                }
                if($role->name=='associated'){
                    $role->permissions()->sync($associated_permissions);
                }
            }            
        }
        if (Role::find(1)){
            $role= Role::find(1);
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