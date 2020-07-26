<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTypes extends Model
{
    
    protected $guarded=[];
    
    public function payments()
    {
        return $this->hasMany(\App\Payment::class)
    }
}
