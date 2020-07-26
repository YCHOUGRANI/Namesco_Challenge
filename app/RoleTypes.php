<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleTypes extends Model
{
    protected $fillable = ['name','description'];
    
    public function roles()
    {
        return $this->hasMany(\App\Roles::class);
    }
}
