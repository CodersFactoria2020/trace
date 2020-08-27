<?php

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'description' => $faker->text(100),
        'color' => $faker->colorName,
        'textColor' => $faker->hexcolor,
    ];
});
