<?php

namespace App\Services;

use App\Entities\UsersEntities;
use App\Repositories\UsersRepository;

class UsersServices
{


    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        return $this->usersRepository = $usersRepository;
    }


    /**
     * @param UsersEntities $UsersEntities
     * @return mixed
     */
    public function store(UsersEntities $UsersEntities)
    {
        return $this->usersRepository->create($UsersEntities->getAttributesArray());
    }

}
