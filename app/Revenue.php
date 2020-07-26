<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = ['amount','year','month','film_id'];

    public function film()
    {
        return $this->belongsTo(\App\Film::class);
    }

    public function scopeGroupByYearMonth()
    {
        
        $data1 = Revenue::selectRaw('film_id,year,month, sum(amount)')
      ->groupBy('film_id,year,month')->get();
        //return "SELECT film_id,year,month, sum(amount) FROM revenues group by film_id,year,month"; 
        return $data1;
    }
}
