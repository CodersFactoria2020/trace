<?php

use Illuminate\Database\Seeder;
use App\User;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $adminRole=1;
        $professionalRole=2;
        $associatedRole=3;

        for ($i=1; $i <=23; $i++){
            if ($i==1 or $i==2){
                $user = User::find($i);
                $user->roles()->sync([$adminRole]);
            }
            if ($i>2 and $i<=7){
                $user = User::find($i);
                $user->roles()->sync([$professionalRole]);
            }
            if ($i>7){
                $user = User::find($i);
                $user->roles()->sync([$associatedRole]);
            }
        }
    }
}
