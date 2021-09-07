<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";

    public function product(){
        return $this->hasMany('App\Products','id_type','id'); //id cua product_type
    }
    //Một loại sản phẩm sẽ có nhiêu sản phẩm, nên là quan hệ một nhiều -> hasMany
}
