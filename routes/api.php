<?php

use App\Http\Controllers\AlamatKabupatenController;
use App\Http\Controllers\AlamatKecamatanController;
use App\Http\Controllers\AlamatProvinsiController;
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

Route::get('/alamat-provinsi', [AlamatProvinsiController::class, 'index']);
Route::get('/alamat-kabupaten/provinsi-id/{id}', [AlamatKabupatenController::class, 'index']);
Route::get('/alamat-kecamatan/kabupaten-id/{id}', [AlamatKecamatanController::class, 'index']);
