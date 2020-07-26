<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
     
        $this->call(RoleTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
               
      // $this->call(EmployeesTableSeeder::class);
        
      
       // $this->call(EmployeeRolesTableSeeder::class);
        $this->call(RevenuesTableSeeder::class);
    }
}
