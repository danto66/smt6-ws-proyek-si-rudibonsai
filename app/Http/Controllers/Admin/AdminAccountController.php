<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\AdminProfile;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    public function index()
    {
        $admin = User::with('userProfile')->where('id', auth()->User()->id)->first();

        return view('admin.admin-account', compact('admin'));
    }

    public function update(Request $request)
    {
        // $userProfile = AdminProfile::where('user_id', auth()->User()->id)->first();
        $admin = User::find(auth()->User()->id);


        if ($request->password != null) {
            $admin->password = Hash::make($request->password);
            $admin->save();
        }

        return redirect()->route('admin.dashboard')->with(['status' => 'success', 'message' => 'Password berhasil diubah']);
    }
}
