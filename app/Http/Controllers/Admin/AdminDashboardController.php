<?php

namespace App\Http\Controllers\Admin;

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
        $countuser = User::where('role_id', 3)->count();
        $countorder = Order::all()->count();
        $countdone = Order::where('status', 'Selesai')->count();
        $income = Order::select('grand_total_amount')->get()->sum('grand_total_amount');

        return view('admin.dashboard', compact('countuser', 'countorder', 'countdone', 'income'));
    }
}
