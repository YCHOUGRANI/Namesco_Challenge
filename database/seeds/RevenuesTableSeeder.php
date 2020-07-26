<?php

use Illuminate\Database\Seeder;

class RevenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Revenue::class,30)->create();
    }
}
