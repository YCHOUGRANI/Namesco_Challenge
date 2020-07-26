<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['title','description','start_at','finish_at'];

    public function employees()
    {
        return $this->belongsToMany(\App\Employee::class)->withTimestamps();
    }
    public function revenues()
    {
        return $this->hasMany(\app\Revenue::class);
    }
}
