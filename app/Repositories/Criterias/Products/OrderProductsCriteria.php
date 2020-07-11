<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;
use Illuminate\Support\Facades\DB;

class OrderProductsCriteria implements CriteriaInterface
{

    private $orderId = null;

    public function __construct($orderId = null, $available = true)
    {
        $this->orderId = $orderId;
        $this->available = $available;
    }


    protected function getReservedQuery($model)
    {
        $builder = $model->select([
            "_oi.product_id", "_o.priority"
        ])
            ->selectSub("SUM(_oi.quantity)", "reserved_quantity")
            ->from("orders as _o")
            ->join("order_items as _oi", "_o.id", "_oi.order_id")
            ->groupBy("_oi.product_id")
            ->groupBy("_o.priority");


        return $builder;
    }

    public function apply($model, $repository)
    {
        
        $correlatedQuery = $this->getReservedQuery($model);
        $operator = $this->available ? "<=" : ">";
        $builder = $model->select([
            "p.*",
            "i.quantity as in_stock"
        ])
            ->selectSub("IF(SUM(s.reserved_quantity) IS NOT NULL,SUM(s.reserved_quantity),0)", "total_reserved")
            ->selectSub("IF(SUM(oi.quantity) IS NOT NULL, SUM(oi.quantity), 0)", "total_ordered")
            ->from("products as p")
            ->leftJoin("inventories as i", "p.id", "i.product_id")
            ->join("order_items as oi", "p.id", "oi.product_id")
            ->join("orders as o", "oi.order_id", "o.id")
            ->leftJoin(
                DB::raw("(" . $correlatedQuery->toSql() . ") as s"),
                function ($join) use($correlatedQuery){
    
                    $join->on("p.id", "=", "s.product_id");
                    $join->on("o.priority", "<", "s.priority");
                    $join->addBinding($correlatedQuery->getBindings());
                }
            )

            ->havingRaw("total_ordered $operator (in_stock + total_reserved)")
            ->groupBy("p.id")
            ->groupBy("i.quantity");

        if ($this->orderId) {
            $builder->where("o.id", $this->orderId);
        }

        

        //echo $builder->toSql();exit;
        return $builder;
    }
}
