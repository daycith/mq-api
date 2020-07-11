<?php

namespace App;

class OrderItem extends BaseModel
{
    protected $fillable =[
        "order_id","product_id","quantity"
    ];

    public function order(){
        return $this->belongsTo(\App\Order::class);
    }

    public function product(){
        return $this->belongsTo(\App\Product::class);
    }

}
