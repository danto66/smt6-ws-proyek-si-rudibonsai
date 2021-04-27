<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\ProvinceController;
use App\Http\Controllers\Address\SubdistrictController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/address')->name('address')->group(function () {
    Route::get('/provinces', [ProvinceController::class, 'index'])->name('.provinces');
    Route::get('/cities/province/{id}', [CityController::class, 'getCitiesByProvinceId'])->name('.cities');
    Route::get('/subdistricts/city/{id}', [SubdistrictController::class, 'getSubdistrictsByCityId'])->name('.subdistricts');
});
