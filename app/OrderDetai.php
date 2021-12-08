<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetai extends Model
{
    //
    public $timestamps = false;
    public function order(){
        return $this->belongsTo('App\Order', 'order_id','id');
    }
    public function product_order_detail(){
        return $this->hasOne('App\Product', 'product_id','order_id,product_id');
    }
}
