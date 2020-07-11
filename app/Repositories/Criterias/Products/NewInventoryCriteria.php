<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;
use Illuminate\Support\Facades\DB;

class NewInventoryCriteria implements CriteriaInterface
{

    private $date = null;

    public function __construct($date)
    {
        $this->date = $date;
    }


    protected function getCorrelatedQuery($model)
    {
        $builder = $model->select([
            "_oi.product_id"
        ])
            ->selectSub("SUM(_oi.quantity)", "ordered")
            ->from("orders as _o")
            ->join("order_items as _oi", "_o.id", "_oi.order_id")
            
            ->where("delivery_date", $this->date)
            ->groupBy("_oi.product_id");


        return $builder;
    }

    public function apply($model, $repository)
    {

        $correlatedQuery = $this->getCorrelatedQuery($model);
        $inStockStatement = "IF(i.quantity IS NOT NULL, i.quantity, 0)";
        $orderedStatement = "IF(cr.ordered IS NOT NULL , cr.ordered, 0)";
        $newStockStatement = "IF($inStockStatement >= $orderedStatement, $inStockStatement - $orderedStatement, 0)";
        $builder = $model->select([
            "p.id",
            "p.name",
        ])
            ->selectSub($inStockStatement, "in_stock")
            ->selectSub($orderedStatement, "ordered")
            ->selectSub($newStockStatement, "new_stock")
            ->from("products as p")
            ->leftJoin("inventories as i", function($q){
                $q->on("p.id", "i.product_id")
                ->where("i.date",$this->date);
            })
            ->leftJoin(
                DB::raw("(" . $correlatedQuery->toSql() . ") as cr"),
                function ($join) use ($correlatedQuery) {

                    $join->on("p.id", "=", "cr.product_id");
                    $join->addBinding($correlatedQuery->getBindings());
                }
            )
            ;


        //echo $builder->toSql();exit;
        return $builder;
    }
}
