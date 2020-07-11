<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;

class ProductsToShipCriteria implements CriteriaInterface
{

    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function apply($model, $repository)
    {
        $builder = $model->from("products as p")
            ->join("order_items as oi", "p.id", "oi.product_id")
            ->join("orders as o", "oi.order_id", "o.id")
            ->join("carriers as c", "o.carrier_id", "c.id")
            ->join("users as u", "o.user_id", "u.id")
            ->leftJoin("inventories as i", function ($q) {
                $q->on("p.id", "i.product_id")
                    ->where("i.date", $this->date);
            })
        ->select([
            "p.id",
            "p.name",
            "o.id as order_id",
            "u.address",
            "c.name as carrier"
        ]);

        $builder->selectSub("IF(SUM(oi.quantity) IS NOT NULL , SUM(oi.quantity),0)", "to_be_listed");
        $builder->where("o.delivery_date",$this->date);
        
        $builder->groupBy("p.id");
        $builder->groupBy("o.id");

        // echo $builder->toSql(); exit;
        
        return $builder;
    }
}
