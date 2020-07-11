<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }
}
