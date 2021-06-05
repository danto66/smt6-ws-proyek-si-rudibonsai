<?php

use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\ProductCategoryAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
require __DIR__ . '/auth.php';

// main app / frontend (tampilan yang diakses pembeli)
Route::middleware(['not.admin', 'verified.or.guest'])->name('main.')->group(function () {
    // non-auth / publik (dapat diakses tanpa login)
    // home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // produk
    Route::prefix('/products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    });

    // auth user / dapat diakses setelah login sebagai user
    Route::middleware('auth')->group(function () {
        // keranjang
        Route::prefix('/carts')->name('cart.')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add_to_cart');
            Route::post('/buy-now/{product}', [CartController::class, 'buyNow'])->name('buy_now');
            Route::delete('/{cart}', [CartController::class, 'destroy'])->name('destroy');
        });

        // cheeckout
        Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

        // pesanan
        Route::prefix('/orders')->name('order.')->group(function () {
            Route::get('/{status?}', [OrderController::class, 'index'])->name('index');
            Route::get('/detail/{order}', [OrderController::class, 'detail'])->name('detail');
            Route::put('/detail/{order}/payment-proof', [OrderController::class, 'uploadPaymentProof'])->name('upload_payment_proof');
        });
    });
});

//admin dashboard / backend (tampilan yang diakses admin)
Route::prefix('/admin')->name('admin.')->group(function () {
    // non-auth / dapat diakses tanpa login
    // logout
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'store'])->name('login.store');
    });

    // auth admin / dapat diakses setelah login sebagai admin
    Route::middleware('is.admin')->group(function () {
        // logout
        Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('logout');

        // dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // produk
        Route::resource('/products', ProductAdminController::class);

        // foto produk
        Route::prefix('/products')->name('products.')->group(function () {
            Route::get('/{product}/images', [ProductAdminController::class, 'editImages'])->name('images.edit');
            Route::post('/{product}/images', [ProductAdminController::class, 'addImage'])->name('images.add');
            Route::put('/{product}/images/{productImage}', [ProductAdminController::class, 'setPrimaryImage'])->name('images.set_primary');
            Route::delete('/images/{productImage}', [ProductAdminController::class, 'destroyImage'])->name('images.destroy');
        });

        // kategori produk
        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/', [ProductCategoryAdminController::class, 'index'])->name('index');
            Route::post('/', [ProductCategoryAdminController::class, 'store'])->name('store');
            Route::put('/{category}', [ProductCategoryAdminController::class, 'update'])->name('update');
            Route::delete('/{category}', [ProductCategoryAdminController::class, 'destroy'])->name('destroy');
        });

        // pesanan
        Route::prefix('/orders')->name('order.')->group(function () {
            Route::get('/{status?}', [OrderAdminController::class, 'index'])->name('index');
            Route::get('/detail/{order}', [OrderAdminController::class, 'detail'])->name('detail');
            Route::put('/detail/{order}/update-status', [OrderAdminController::class, 'updateStatus'])->name('update_status');
        });
    });
});
