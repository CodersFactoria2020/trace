<?php

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName($gender ='male'|'female'),
        'last_name'=> $faker->lastName(),
        'position' => $faker->jobTitle(),
        'photo' => $faker->image(null, 50, 50, 'cats', true, true, 'Faker')
    ];
});
