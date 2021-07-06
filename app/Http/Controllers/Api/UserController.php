<?php

namespace App\Http\Controllers\Api;

use App\Entities\UsersEntities;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * @var UsersServices
     */
    private $usersServices;

    public function __construct(UsersServices $usersServices)
    {
        $this->usersServices = $usersServices;

    }


    /**
     * @param UserStoreRequest $request
     */
    public function store(UserStoreRequest $request)
    {
        $UsersEntities = UsersEntities::fromRequest($request);
        $user = $this->usersServices->store($UsersEntities);
        return UserResource::make($user);
    }


}
