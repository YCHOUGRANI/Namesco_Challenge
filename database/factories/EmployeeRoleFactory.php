<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeRole;
use Faker\Generator as Faker;

$factory->define(EmployeeRole::class, function (Faker $faker) {
    return [
        'employee_id' => App\Employee::inRandomOrder()->first()->id,
        'film_id' => App\Film::inRandomOrder()->first()->id,
        'role_id' => App\Role::inRandomOrder()->first()->id
    ];
});


