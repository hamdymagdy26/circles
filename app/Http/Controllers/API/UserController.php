<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserService $userService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Register New User
     *
     * @param  UserFormRequest $request
     * @return UserResource
     */
    public function register(UserFormRequest $request)
    {
        $user = $this->userService->register($request->validated());
        return (new UserResource($user))
            ->additional(ResponseType::simpleResponse('User has been created', true));
    }

    /**
     * Login to get user token
     *
     * @param  Request $request
     */
    public function login(Request $request)
    {
        $user = $this->userService->login($request);
        return response()->json(['data', $user]);
    }

}
