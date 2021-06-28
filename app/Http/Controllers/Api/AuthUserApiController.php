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

        $response = [
            'status' => 'true',
            'message' => 'Login success',
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'role_id' => $user->role_id,
                'fullname' => $user->userProfile->fullname,
                'phone' => $user->userProfile->phone,
                'gender' => $user->userProfile->gender,
                'profile_picture' => $user->userProfile->profile_picture,
                'province' => $user->userProfile->province->province_name,
                'city' => $user->userProfile->city->city_name,
                'city_id' => $user->userProfile->city->city_id,
                'subdistrict' => $user->userProfile->subdistrict->subdistrict_name,
                'address_detail' => $user->userProfile->address_detail,
                'token' => $token,
            ],
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
