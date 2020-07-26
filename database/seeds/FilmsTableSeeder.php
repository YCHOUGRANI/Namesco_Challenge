<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        factory(\App\Film::class,1)->create()->each(function ($f) {
            $f->employees()->saveMany(factory(\App\Employee::class,rand(10,20))->make())->each(function ($e) {
                $e->contracts()->saveMany(factory(\App\Contract::class, 1)->make())->each(function ($c) {
                    $c->contract_details()->saveMany(factory(\App\ContractDetail::class, rand(1,5))->make());
                   });
              });
            });

   
    }
}
