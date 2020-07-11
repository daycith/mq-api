<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;
use Illuminate\Support\Facades\DB;

class TopSellersCriteria implements CriteriaInterface
{
    private $date = null;
    private $ordering = "asc";
    public function __construct($date = null, $ordering = "asc")
    {
        $this->date = $date;
        $this->ordering = $ordering;
    }

    protected function getSalesQuery($model)
    {
        $builder = $model->from("order_items as oi");
        $builder->join("orders as o", "oi.order_id", "o.id");

        if ($this->date) {
            $builder->where("o.delivery_date", $this->date);
        }
        $builder->select("oi.product_id");
        $builder->selectSub("SUM(oi.quantity)","sales");
        $builder->groupBy("oi.product_id");
        return $builder;
    }

    public function apply($model, $repository)
    {
        $builder = $model->from("products as p");
        $builder->select(["p.id","p.name"]);

        $builderSales = $this->getSalesQuery($model);

        $builder->leftJoin(
            DB::raw("(" . $builderSales->toSql() . ") as s"),
            function ($join) use($builderSales){

                $join->on("p.id", "=", "s.product_id");
                $join->addBinding($builderSales->getBindings());
            }
        );

        
        $builder->selectSub("IF(s.sales IS NOT NULL , s.sales, 0)", "sales");
        
        $builder->orderBy("s.sales", $this->ordering);

        //echo $builder->toSql(); exit;
        return $builder;
    }
}
