<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;
use Illuminate\Support\Facades\DB;

class AvailableProductsCriteria implements CriteriaInterface
{

    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function apply($model, $repository)
    {
        $builder = $model->select([
            "p.id",
            "p.name"
        ])
            ->selectSub("IF(i.quantity IS NOT NULL,i.quantity,0)", "in_stock")
            ->selectSub("IF(SUM(oi.quantity) IS NOT NULL, SUM(oi.quantity), 0)", "total_ordered")
            ->from("products as p")
            ->leftJoin("inventories as i", function ($q) {
                $q->on("p.id", "i.product_id")
                    ->where("i.date", $this->date);
            })
            ->leftJoin("order_items as oi", "p.id", "oi.product_id")
            ->leftJoin("orders as o", function ($q) {
                $q->on("oi.order_id", "o.id");
                $q->where("o.delivery_date", $this->date);
            })

            ->groupBy("p.id")
            ->groupBy("i.quantity")
            ->havingRaw("in_stock >= total_ordered");

        //echo $builder->toSql(); exit;

        return $builder;
    }
}
