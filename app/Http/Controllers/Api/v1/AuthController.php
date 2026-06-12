<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register (StoreUserRequest $request)
    {
        return User::create($request->validated());
    }

    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }


        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'User' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    public function logout()
    {
        return 'Logged out';
    }
}
