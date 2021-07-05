<?php

namespace App\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Models\User;

class UsersRepository extends BaseRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
