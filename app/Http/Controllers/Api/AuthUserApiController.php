<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;

class AuthUserApiController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'fullname' => 'required|string',
            'phone' => 'required|string|size:12',
            'gender' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'subdistrict_id' => 'required',
            'address_detail' => 'required',
        ]);

        Auth::login($user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]));

        event(new Registered($user));

        $user->userProfile()->create($request->all());

        // $user->tokens()->delete();

        $token = $user->createToken('authToken')->plainTextToken;

        $user->userProfile;
        $user->userProfile->province;
        $user->userProfile->city;
        $user->userProfile->subdistrict;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(LoginRequest $request)
    {
        $request->validateUserType('user');
        $request->authenticate();

        $user = User::where('email', $request->email)->first();

        $user->tokens()->delete();

        $token = $user->createToken('authToken')->plainTextToken;

        $user->userProfile;
        $user->userProfile->province;
        $user->userProfile->city;
        $user->userProfile->subdistrict;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        $response = [
            'message' => 'Logged out'
        ];

        return $response;
    }
}
