<?php

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [

    ];
});

// TESTS - state - ADMIN Role
$factory->state(Role::class, 'Admin', [
    'id' => Role::$admin_id,
    'name' => 'Admin'
]);
// TESTS - state - PROFESSIONAL Role
$factory->state(Role::class, 'Professional', [
    'id' => Role::$professional_id,
    'name' => 'Professional',
]);
// TESTS - state - SOCI Role
$factory->state(Role::class, 'Soci', [
    'id' => Role::$soci_id,
    'name' => 'Soci',
]);
