<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RajaOngkirApiController extends Controller
{
    public function getCost($courier, $destination, $weight)
    {
        $response = Http::asForm()->withHeaders([
            'key' => env('KEY_RAJAONGKIR'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'courier' => $courier,
            'origin' => env('ORIGIN_ID'),
            'destination' => $destination,
            'weight' => $weight,
        ])->json();

        return $response;
    }
}
