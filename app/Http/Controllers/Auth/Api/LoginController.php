<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response(['message' => 'Invalid credentials'], 401);
        }

        $user = User::firstWhere('email', $request->email);

        return response()->json([
            'token' => $user->createToken('token')->plainTextToken,
        ], 200);

    }
}
