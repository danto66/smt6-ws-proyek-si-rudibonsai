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
            'key' => config('rajaongkir.key'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'courier' => $courier,
            'origin' => config('rajaongkir.origin_id'),
            'destination' => $destination,
            'weight' => $weight,
        ])->json();

        return $response;
    }
}
