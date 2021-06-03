<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
    public function index($status = 'semua')
    {
        $orders = Order::with('products')->get()->sortDesc();

        if ($status !== 'semua') {
            $orders = $orders->where('status', ucfirst($status));
        }

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function detail(Order $order)
    {
        $profile = $order->user->userProfile;

        $items = OrderDetail::with(['product', 'productImages'])->where('order_id', $order->id)->get();

        switch ($order->status) {
            case 'Tertunda':
                $nextStatus = 'Diproses';
                break;
            case 'Diproses':
                $nextStatus = 'Dikirim';
                break;
            case 'Dikirim':
                $nextStatus = 'Selesai';
                break;
            default:
                $nextStatus = '';
                break;
        }

        return view('admin.orders.detail', compact('order', 'profile', 'items', 'nextStatus'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->next_status;
        $order->save();

        return back()->with(['message' => 'Status berhasil diubah', 'type' => 'success']);
    }
}
