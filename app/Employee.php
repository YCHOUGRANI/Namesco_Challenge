<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name','last_name','email'];

    public function films()
    {
       return $this->belongsToMany(\app\Film::class)->withTimestamps();

    }
    public function roles()
    {
        return $this->belongsToMany(\App\EmployeeFilmRole::class)->withTimestamps();
    }
    public function payments()
    {
        return $this->hasMany(\App\Payment::class)->withTimestamps();
    }
    public function contracts()
    {
        return $this->hasMany(\App\Contract::class);
    }

}
