<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = "type_products";
    public function product(){
        return $this->hasMany('App\Model\Product','id_type','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\Model\BillDetail','id_product','id');
    }
}
