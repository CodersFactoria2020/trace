<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        factory(Role::class)->create(['role_name'=>'Soci']);
        factory(Role::class)->create(['role_name'=>'Professional']);
        factory(Role::class)->create(['role_name'=>'Admin']);
    }
}