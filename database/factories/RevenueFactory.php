<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Revenue;
use Faker\Generator as Faker;

$factory->define(\App\Revenue::class, function (Faker $faker) {
    return [
        'amount' => rand(12000,36000),
        'film_id' => App\Film::inRandomOrder()->first()->id,
        'year' => 2020,
        'month' => rand(1,12)
    ];
});
