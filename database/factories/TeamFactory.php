<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'fullname' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'profession' => $faker->jobTitle(),
        'photo' => $faker->image('images',640,480, null, false)

    ];
});
