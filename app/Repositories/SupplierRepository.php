<?php

namespace App\Repositories;

use App\Provider;

class ProviderRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return Provider::class;
    }
}
