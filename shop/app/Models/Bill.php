<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";

    public function bill_detail(){
        return $this->hasMany('App\Model\Bill_Detail','id_bill','id');
}
    public function customer(){
        return $this->belongsTo('App\Model\Customer','id_customer','id');
}
}
