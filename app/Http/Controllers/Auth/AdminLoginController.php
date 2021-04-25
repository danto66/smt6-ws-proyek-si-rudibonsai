<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AdminLoginController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    public function store(LoginRequest $request)
    {
        $request->validateUserType('admin');

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
