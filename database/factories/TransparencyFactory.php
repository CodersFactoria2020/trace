<?php

use App\Transparency;
use Faker\Generator as Faker;

$factory->define(Transparency::class, function (Faker $faker) {
    return [
        'date_name' => $faker->numerify(),
        'economic_document'=>$faker->fileExtension,
        'entity_document'=>$faker->fileExtension,
    ];
});
