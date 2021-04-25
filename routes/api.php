<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alamat\ProvinsiController;
use App\Http\Controllers\Alamat\KabupatenController;
use App\Http\Controllers\Alamat\KecamatanController;

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

Route::prefix('/alamat')->name('alamat')->group(function () {
    Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('.provinsi');
    Route::get('/kabupaten/provinsi-id/{id}', [KabupatenController::class, 'index'])->name('.kabupaten');
    Route::get('/kecamatan/kabupaten-id/{id}', [KecamatanController::class, 'index'])->name('.kecamatan');
});
