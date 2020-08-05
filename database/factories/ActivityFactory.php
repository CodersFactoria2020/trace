<?php

use App\Activity;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Punt de Mira','Neurogym','Club de lectura Dijous','Anglès', 'El batec del cervell']),
        'description' => $faker->realText($maxNbChars = 10),
        'file' => $faker->randomElement(['pdf', 'jpg', 'png', 'gif', '']),
        'professional' => $faker->randomElement(['Tina','Nico','Anna','Sara', 'Laia', 'Vicky', 'Suseta', 'Carina', 'Mario']),
        'date' =>  $faker->dateTimeBetween('now', '+4 days', $timezone = 'Europe/Madrid'),
        'time' => $faker->time(),
        'category_id' => $faker->randomElement(['1', '2', '3', '4', '5', '6'])
    ];
});