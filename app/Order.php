<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products_total(){
        return $this->belongsToMany(Product::class,
            'order_detais', 'order_id', 'product_id');
    }
    public function order_detail(){
        return $this->hasMany('App\OrderDetai', 'order_id','id');
    }
    public function getSumOrderTotalInMonth() {
        return $this->selectRaw('DATE_FORMAT(updated_at, "%m-%d") AS md,
        SUM(total_money) AS total_amount, count(id) AS total_order')
            ->whereRaw('updated_at >=  DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH), "%Y-%m-%d")')
            ->where('shipping_status',3)
            ->groupBy('md')->get();
    }
    public function getSumOrderTotalInYear() {
        return $this->selectRaw('DATE_FORMAT(updated_at, "%Y-%m") AS ym, SUM(total_money) AS total_amount')
            ->whereRaw('updated_at >=  DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL 12 MONTH), "%Y-%m")')
            ->where('shipping_status',3)
            ->groupBy('ym')->get();
    }
}
