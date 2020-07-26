<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractDetail extends Model
{
    protected $fillable = ['name','description','contract_id','role_id','fixed_monthly','fixed_fee','monthly_fee','percentage_share'];

    public function contract()
    {
        return $this->belongsTo(\App\Contract::class);
    }

    public function payments()
    {
        return $this->hasMany(\App\Payment::class);
    }

}
