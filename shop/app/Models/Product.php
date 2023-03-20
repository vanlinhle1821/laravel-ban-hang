<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    public function product_type(){
        return $this->belongsTo('App\Model\ProductType','id_type','id');
    }
}
