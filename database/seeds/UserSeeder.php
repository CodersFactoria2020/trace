<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create(['first_name' => 'Santiago', 'last_name' => 'Ramón y Cajal', 'email' => 'santiago.ramonycajal@tracecatalunya.org', 'phone' => '+34123456789', 'dni' => '12345678A']);
        factory(\App\User::class,22)->create();
    }
}