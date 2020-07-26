<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'role_type_id' => App\RoleTypes::inRandomOrder()->first()->id,
        
    ];
});
