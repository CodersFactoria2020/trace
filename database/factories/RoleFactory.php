<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'id' => '3',
        'role_name' => 'Admin',       
    ];
});
$factory->define(Role::class, function (Faker $faker) {
    return [
        'id' => '1',
        'role_name' => 'Soci',       
    ];
});
// $factory->define(Role::class, function (Faker $faker) {
//     return [
//         'id' => '2',
//         'role_name' => 'Professional',       
//     ];
// });