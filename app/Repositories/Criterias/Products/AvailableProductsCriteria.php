<?php

namespace App\Repositories\Criterias\Products;

use Czim\Repository\Contracts\CriteriaInterface;

class AvailableProductsCriteria implements CriteriaInterface
{

    private $date = null;

    public function __construct($date = null)
    {
        $this->date = $date;
    }

    public function apply($model, $repository)
    {
        $builder = $model->select([
            "p.*",
            "i.quantity as available"
        ])->from("products as p")
            ->join("inventories as i", "p.id", "i.product_id")
            ->where("i.quantity", ">", "0");

        if ($this->date) {
            $builder->where("i.date", $this->date);
        }

        return $builder;
    }
}
