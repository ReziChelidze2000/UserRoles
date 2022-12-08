<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\Interfaces\IAuthRepository;

class AuthRepository implements IAuthRepository
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $user->assignRole('user');

        return response([
            'code' => 200,
            'message' => 'You have register'
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!\auth()->attempt($request->validated())) {
            return response([
                'message' => 'invalid credentials'
            ], 422);
        }

        $token = auth()->user()->createToken('accesstoken')->plainTextToken;

        return response([
            'user' => \auth()->user(),
            'token' => $token
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'You are logged out'
        ]);
    }
}
