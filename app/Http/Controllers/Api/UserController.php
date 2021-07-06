<?php

namespace App\Http\Controllers\Api;

use App\Utils\HttpStatusCodeUtil;
use App\Entities\UsersEntities;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        try {
            $user = $this->usersServices->store($UsersEntities);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), compact("exception"));
            $payload = [
                "errors" => [
                    "message" => $exception->getMessage()
                ]
            ];
            return $this->response($payload, HttpStatusCodeUtil::INTERNAL_SERVER_ERROR);
        }
        return UserResource::make($user);
    }


}
