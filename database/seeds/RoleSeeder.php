<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        factory(Role::class)->create(['name'=>'admin', 'description'=>'Administrador del sitio']);
        factory(Role::class)->create(['name'=>'professional', 'description'=>'Formador de TraCE']);
        factory(Role::class)->create(['name'=>'associated', 'description'=>'Asociado de TraCE']);
    }
}
