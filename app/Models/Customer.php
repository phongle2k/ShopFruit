<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    public function bill(){
        return $this->belongsTo('App\Bills','id_customer','id');//id - Customer
    }
}
