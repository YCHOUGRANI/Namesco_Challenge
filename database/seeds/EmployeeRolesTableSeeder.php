<?php

use Illuminate\Database\Seeder;

class EmployeeRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\EmployeeRole::class,40)->create();
    }
}
