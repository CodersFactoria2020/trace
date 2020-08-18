<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'phone' => $faker->phoneNumber(),
        'dni' => $faker->dni(),
        'role_id'=> $faker->numberBetween($min = 1, $max = 2),
    ];
});

// $factory->state(User::class, 'Admin', [
//     'role_id' => 3,
// ]);

$factory->state(User::class, 'Soci', [
    'role_id' => 1,
]);
