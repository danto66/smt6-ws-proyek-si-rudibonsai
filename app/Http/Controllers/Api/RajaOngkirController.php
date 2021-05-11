<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    public function getCost($courier, $destination, $weight)
    {
        $response = Http::asForm()->withHeaders([
            'key' => env('KEY_RAJAONGKIR'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'courier' => $courier,
            'origin' => '74',
            'destination' => $destination,
            'weight' => $weight,
        ])->json();

        return $response;
    }
}
