<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function index()
    {
        $response = [
            'carts' => Cart::with(["product", "productImages"])->where('user_id', auth()->user()->id)->get()
        ];

        return response($response);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
        ]);

        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
        ]);

        $response = [
            'message' => 'produk berhasil ditambahkan ke keranjang',
        ];

        return response($response);
    }

    public function destroy(Cart $cart)
    {
        $this->authorize('delete', $cart);
        $cart->delete();

        $response = [
            'message' => 'item berhasil dihapus dari keranjang',
        ];

        return response($response);
    }
}
