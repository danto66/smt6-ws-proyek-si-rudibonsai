<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminProfile;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function index()
    {
        $admin = User::where('role_id', 2)->paginate(10);

        return view('admin.admin-management', compact('admin'));
    }

    public function store(Request $request)
    {
        $admin = User::create([
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);

        AdminProfile::create([
            'name' => $request->email,
            'user_id' => $admin->id,
        ]);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Admin berhasil ditambahkan.']);
    }

    public function destroy($id)
    {
        AdminProfile::where('user_id', $id)->delete();
        User::destroy($id);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Admin berhasil dihapus.']);
    }
}
