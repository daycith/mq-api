<?php

namespace App\Repositories;

use Czim\Repository\BaseRepository as CZimRepository;

abstract class BaseRepository extends CZimRepository
{
    public function attach($item, $relation, $ids){
        $item->{$relation}()->attach($ids);
        $item->save();
        return $item;
    }
}
