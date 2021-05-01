<?php

use App\Http\Controllers\Admin\ProductCategoryPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\ProductPageController;

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

Route::middleware(['not.admin', 'verified.or.guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/products', function () {
        return view('main.product');
    });
});

Route::prefix('/admin')->name('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'create'])->name('.login');
        Route::post('/login', [AdminLoginController::class, 'store']);
    });

    Route::middleware('is.admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('.logout');
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('.dashboard');

        Route::resource('/products', ProductPageController::class);
        Route::resource('/categories', ProductCategoryPageController::class);
    });
});
