<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product', 'productImages'])->where('user_id', auth()->user()->id)->get();

        return view('main.cart', compact('carts'));
    }

    public function store($product)
    {
        Cart::create([
            'product_id' => $product,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function addToCart($product)
    {
        $this->store($product);

        return back()->with(['type' => 'success', 'message' => 'Produk berhasil ditambahkan ke keranjang.']);
    }

    public function buyNow($product)
    {
        $this->store($product);

        return redirect()->route('main.cart.index');
    }

    public function destroy(Cart $cart)
    {
        $this->authorize('delete', $cart);
        $cart->delete();

        return back()->with(['type' => 'success', 'message' => 'Produk berhasil dihapus dari keranjang']);
    }
}
