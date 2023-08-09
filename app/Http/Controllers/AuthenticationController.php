<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginAuthenticationRequest;


class AuthenticationController extends Controller
{

    public function register(StoreUserRequest $request)
    {
        $payload = $request->validated($request->all());
        $payload['password'] = Hash::make($payload['password']);
        $user = User::create($payload);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token, 'message' => 'User created!'], 201);
    }


    public function login(LoginAuthenticationRequest $request)
    {
        $credentials = $request->validated($request->only('email', 'password'));
        if (!Auth::attempt($credentials)) {
            return response()->json(['code' => 401, 'message' => 'Invalid credentials'], 401);
        }
        $user = User::where('email', $request->email)->firstOrFail();

        $token = $request->user()->createToken('authToken')->plainTextToken;
        return response()->json(['code' => 200, 'message' => 'Login success!', 'token' => $token, 'data' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->success(null, 'Logged out', 200);
    }
}
