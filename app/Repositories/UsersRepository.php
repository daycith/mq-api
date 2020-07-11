<?php

namespace App\Repositories;

use App\User;

class UsersRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
