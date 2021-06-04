<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\ProvinceController;
use App\Http\Controllers\Address\SubdistrictController;
use App\Http\Controllers\Api\AuthUserApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductCategoryApiController;
use App\Http\Controllers\Api\RajaOngkirController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/address')->name('address')->group(function () {
    Route::get('/provinces', [ProvinceController::class, 'index'])->name('.provinces');
    Route::get('/cities/province/{id}', [CityController::class, 'getCitiesByProvinceId'])->name('.cities');
    Route::get('/subdistricts/city/{id}', [SubdistrictController::class, 'getSubdistrictsByCityId'])->name('.subdistricts');
});

Route::get('/get-cost/{courier}/{destination}/{weight}', [RajaOngkirController::class, 'getCost']);

Route::middleware('auth:sanctum')->group(function () {
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
    // Route::prefix('/orders')->group(function () {
    // });
});

Route::post('/register', [AuthUserApiController::class, 'register']);
Route::post('/login', [AuthUserApiController::class, 'login']);
