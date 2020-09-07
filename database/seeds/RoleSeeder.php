<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        factory(Role::class)->states('Soci')->create();
        factory(Role::class)->states('Professional')->create();
        factory(Role::class)->states('Admin')->create();
    }
}