<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;

class ProductsToShipCriteria implements CriteriaInterface
{

    public function apply($model, $repository)
    {
        $builder = $model->from("products as p")
            ->join("order_items as oi", "p.id", "oi.product_id")
            ->join("orders as o", "oi.order_id", "o.id")
            ->join("carriers as c", "o.carrier_id", "c.id");

        $builder->select([
            "p.id",
            "p.name",
            "o.id AS order_id",
            "c.id as carrier_id",
            "c.name as carrier_name"
        ]);

        $builder->selectSub("SUM(oi.quantity)", "quantity");
        $builder->groupBy("p.id");
        $builder->groupBy("o.id");

        return $builder;
    }
}
