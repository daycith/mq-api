<?php

namespace App;

class Order extends BaseModel
{
    protected $fillable =[
        "carrier_id","priority","status","delivery_date"
    ];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function carrier(){
        return $this->belongsTo(\App\Carrier::class);
    }

    public function items(){
        return $this->hasMany(\App\OrderItem::class);
    }

}
