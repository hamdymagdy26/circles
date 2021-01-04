<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\UserRepository;
use Dev\Infrastructure\Models\User;
use Illuminate\Support\Arr;
use Auth;

/**
 * Class UserService
 * @package Dev\Domain\Service
 */
class UserService extends AbstractService
{
    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register($data)
    {
        $userData = Arr::only(
            $data,
            [
                'name',
                'email',
                'password',
            ]
        );
        $userData['password'] = bcrypt($userData['password']);

        $user = $this->repository->create($userData);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        return $success;
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login($data)
    {
        $input = $data->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json($success);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }
    }
}
