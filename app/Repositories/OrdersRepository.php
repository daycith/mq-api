<?php

namespace App\Repositories;

use App\Order;

class OrdersRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }
}
