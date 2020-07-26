<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['amount','year','month','contract_detail_id'];

    /*public function payment_type()
    {
        return $this->belongsTo(\App\PaymentType::class);
    }*/
    public function contract_details()
    {
        return $this->belongsTo(\App\ContractDetail::class);
    }
    
}
