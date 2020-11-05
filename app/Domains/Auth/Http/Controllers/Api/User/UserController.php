<?php

namespace App\Domains\Auth\Http\Controllers\Api\User;

use App\Domains\Auth\Http\Requests\Api\User\LoginRequest;
use App\Domains\Auth\Http\Requests\Api\User\RegisterRequest;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * @param LoginRequest $request
     * @return ResponseFactory|Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user             = Auth::user();
            $success['token'] = $user->createToken('nApp')->accessToken;
            return $this->returnSuccess($success);
        }
        else {
            return $this->returnFalse('Unauthorised');
        }
    }

    /**
     * @param RegisterRequest $request
     * @return ResponseFactory|Response
     */
    public function register(RegisterRequest $request)
    {
        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user              = User::create($input);
        $success['token']  = $user->createToken('nApp')->accessToken;
        $success['name']   = $user->name;

        return $this->returnSuccess($success);
    }

    /**
     * @return ResponseFactory|Response
     */
    public function details()
    {
        if ($user = me()) {
            return $this->returnSuccess($user);
        }

        return $this->returnFalse('Unauthorised');
    }
}
