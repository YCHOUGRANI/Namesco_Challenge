<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{

    protected $fillable = ['name','description','employee_id','film_id'];

    public function employee()
    {
        return $this->belongsTo(\App\Employee::class);
    }
    public function contract_details()
    {
        return $this->hasMany(\App\ContractDetail::class);
    }

}
