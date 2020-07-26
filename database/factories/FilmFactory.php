<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    return [
        'title' => $faker->company,  //$faker->catchPhrase
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'start_at' => '2020-01-01 00:00:00',
         'finish_at' => '2021-01-01 00:00:00'
         

    ];
});
