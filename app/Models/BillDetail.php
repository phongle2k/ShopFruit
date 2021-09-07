<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public function product(){
        return $this-> belongsTo('App\Product','id_product','id'); //id of Bill_detail
    }
    //Một hóa đơn chỉ thuộc về một sản phẩm -> belongsTo

    public function bill(){
        return $this->belongsTo('App\Bills','id_bill','id'); //id - bill_detail
    }
}
