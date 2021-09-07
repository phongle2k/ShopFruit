<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function product_type(){
        return $this-> belongsTo('App\ProductType','id_type','id');
    }
    //Một sản phẩm chỉ thuộc về một loại sản phẩ,, nên dùng belongsTo
    
    public function bill_detail(){
        return $this-> hasMany('App\BillDetail','id_product','id');
    }
    //Một sản phẩm sẽ có nhiều bill, quan hệ 1-n -> hasMany
}
