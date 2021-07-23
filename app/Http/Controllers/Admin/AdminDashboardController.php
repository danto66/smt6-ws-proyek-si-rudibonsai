<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Address\Province;
use App\Models\Order;
use App\Models\Role;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = User::where('role_id', 3)->paginate(10);
        // $userProfile = UserProfile::where('user_id', auth()->User()->id)->first();

        $countuser = User::where('role_id', 3)->count();
        $countorder = Order::all()->count();
        $countdone = Order::where('status', 'Selesai')->count();


        return view('admin.dashboard', compact('admin', 'countuser', 'countorder', 'countdone'));
    }
}
