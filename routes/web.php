<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    //$employee=factory(\App\Employee::class)-create();
    // $employee =\App\Employee::first();
    // $roles =\App\Role::all();

    // $roles =\App\Role::first();
    // $employee->roles()->detach($roles);
    // $employee->roles()->attach($roles);  //$employee->roles()->attach([1=>['name'=>'victor'],2,3]);  $employee->roles()->sync([1,2,3]);
    // $employee->roles()->syncWithoutDetaching([3]);
    // dd($employee->roles->first()->pivot->name);
    // dd($roles); 
    return view('welcome');
});


//Route::resource('films','FilmsController');