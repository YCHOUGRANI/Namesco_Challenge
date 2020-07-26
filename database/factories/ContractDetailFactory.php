<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContractDetail;
use Faker\Generator as Faker;

$factory->define(ContractDetail::class, function (Faker $faker) {

    $fixed_monthly = 0;
    $fixed_fee = 0; 
    $monthly_fee= 0; 
    $percentage_share = 0;

    $role_id=App\Role::inRandomOrder()->first()->id;
    
    
    $monthly_fee= rand(12000,36000);  
    $percentage_share= rand(0,100);
    $fixed_fee = rand(12000,36000); 
    $fixed_monthly = rand(12000,36000);
    
    return [
        'name' => 'Contract '.$faker->jobTitle,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'contract_id' => App\Contract::inRandomOrder()->first()->id,
        'role_id' => $role_id,
        'fixed_monthly' => $fixed_monthly,
         'fixed_fee' => $fixed_fee, 
         'monthly_fee' => $monthly_fee, 
         'percentage_share' => $percentage_share
    ];
});
