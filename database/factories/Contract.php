<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contract;
use Faker\Generator as Faker;

$factory->define(Contract::class, function (Faker $faker) {
    return [
        'name' => 'Contract '.$faker->jobTitle,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'employee_id' => App\Employee::inRandomOrder()->first()->id,
        'film_id' => App\Film::inRandomOrder()->first()->id,
        
    ];
});
