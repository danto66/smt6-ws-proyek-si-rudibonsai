<?php

use App\Http\Controllers\Api\AddressApiController;
use App\Http\Controllers\Api\AuthUserApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductCategoryApiController;
use App\Http\Controllers\Api\RajaOngkirApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// data alamat
Route::prefix('/address')->name('address.')->group(function () {
    Route::get('/provinces', [AddressApiController::class, 'getProvinces'])->name('provinces');
    Route::get('/provinces/{id}/cities', [AddressApiController::class, 'getCitiesByProvinceId'])->name('cities');
    Route::get('/cities/{id}/subdistricts', [AddressApiController::class, 'getSubdistrictsByCityId'])->name('subdistricts');
});

// data ongkos kirim
Route::get('/cost/{courier}/{destination}/{weight}', [RajaOngkirApiController::class, 'getCost']);

// login dan register
Route::post('/register', [AuthUserApiController::class, 'register']);
Route::post('/login', [AuthUserApiController::class, 'login']);

// auth user sanctum
// diakses menggunakan token
Route::middleware('auth:sanctum')->group(function () {
    // logout
    Route::post('/logout', [AuthUserApiController::class, 'logout']);

    // data kategori produk
    Route::get('/categories', [ProductCategoryApiController::class, 'index']);
    Route::get('/categories/{category}', [ProductCategoryApiController::class, 'show']);

    // data produk
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{product}', [ProductApiController::class, 'show']);

    // data keranjang 
    Route::prefix('/carts')->group(function () {
        Route::get('/', [CartApiController::class, 'index']);
        Route::post('/', [CartApiController::class, 'store']);
        Route::delete('/{cart}', [CartApiController::class, 'destroy']);
    });

    // data pesanan
    Route::prefix('/orders')->group(function () {
        Route::get('/', [OrderApiController::class, 'index']);
        Route::get('/{order}', [OrderApiController::class, 'detail']);
        Route::post('/', [OrderApiController::class, 'store']);
    });
});
