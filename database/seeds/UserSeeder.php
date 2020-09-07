<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create(['first_name' => 'Santiago', 'last_name' => 'Ramón y Cajal', 'email' => 's.ramonycajal@tracecatalunya.org', 'phone' => '+34123456789', 'dni' => '12345678A', 'role_id' => '3']);
        factory(User::class,10)->create();
    }
}
