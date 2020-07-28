<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->realText($maxNbChars = 10),
        'file' => $faker->fileExtension(),
        'professional' => $faker->name(),
        'date' => $faker->name(),
        'time' => $faker->time(),
    ];
});
