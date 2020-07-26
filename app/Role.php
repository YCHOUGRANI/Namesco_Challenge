<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description','role_type_id'];

    public function employees()
    {
        return $this->belongsToMany(\App\Employee::class)->withPivot(['name'])->withTimestamps();
    }
    
    public function role_type()
    {
        return $this->belongsTo(\App\RoleType::class);
    }
}
