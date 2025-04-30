<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
{
    $credentials = $request->validated();

    if (Auth::attempt($credentials)) {
        $token = Auth::user()->createToken('sanctum_token')->plainTextToken;
        return response()->json(['message' => 'Success'])
            ->cookie('auth_token', $token, 60 * 24 * 7, null, null, true, true);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}
}
