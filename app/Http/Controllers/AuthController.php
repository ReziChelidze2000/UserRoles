<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\IAuthRepository;

class AuthController extends Controller
{
    public function __construct(IAuthRepository $authRepository)
    {
        $this->authRepostitory = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        return $this->authRepostitory->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->authRepostitory->login($request);
    }

    public function logout()
    {
        return $this->authRepostitory->logout();
    }
}
