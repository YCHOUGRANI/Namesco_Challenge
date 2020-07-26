<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_types')->insert([
            ['name'=>'Senior production','description'=>'Senior production'],
            ['name'=>'Production staff','description'=>'Production staff'],
            ['name'=>'Actor','description'=>'Actor'],        
        ]);

       /* DB::table('payment_types')->insert([
            ['name'=>'fixed fee for appearing in a film','description'=>'An actor receives a fixed fee for appearing in a film, which is spread evenly over the expected duration of
            filming'],
            ['name'=>'fixed monthly','description'=>'Production staff (eg lighting crew) only ever receive a fixed monthly amount'],
            ['name'=>'percentage share of revenue generated, for the previous month','description'=>'percentage share of revenue generated, for the previous month'],
            ['name'=>'monthly fee during film production (which continues after filming)','description'=>'monthly fee during film production (which continues after filming)'],               
        ]);*/
    }
}
