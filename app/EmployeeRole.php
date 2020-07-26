<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    protected $guarded=[];

    public function roles()
    {
      return $this->belongsToMany(\App\Role::class)->withTimestamps();
    }
    public function films()
    {
      return $this->belongsToMany(\App\Film::class)->withTimestamps();
    }

}
