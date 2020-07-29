<?php

use App\Activity;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
