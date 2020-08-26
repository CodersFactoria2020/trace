<?php

use App\Activity;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'description' => $faker->text(100),
        'color' => $faker->colorName,
        'textColor' => $faker->hexcolor,
    ];
});
