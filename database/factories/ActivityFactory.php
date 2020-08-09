<?php

use App\Activity;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['Punt de Mira','Neurogym','Club de lectura Dijous','Anglès', 'El batec del cervell']),
        'description' => $faker->realText($maxNbChars = 50),
        'color' => $faker->randomElement(['yellow', 'pink', 'lightgreen', 'lightblue']),
        'textColor' => $faker->randomElement(['black','white']),
        'file' => $faker->randomElement(['pdf', 'jpg', 'png', 'gif', '']),
        'professional1' => $faker->randomElement(['Tina','Nico','Anna','Sara', 'Laia', 'Vicky', 'Suseta', 'Carina', 'Mario']),
        'start' => $faker->dateTimeBetween('now', '+4 days', $timezone = 'Europe/Madrid'),
        'end' => $faker->dateTimeBetween('now', '+4 days', $timezone = 'Europe/Madrid'),
        'category_id' => $faker->randomElement(['1', '2', '3', '4', '5', '6'])
    ];
});