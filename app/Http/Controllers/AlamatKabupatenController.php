<?php

namespace App\Http\Controllers;

use App\Models\AlamatKabupaten;
use Illuminate\Http\Request;

class AlamatKabupatenController extends Controller
{
    public function index(Request $request)
    {
        $kabupaten = AlamatKabupaten::where('provinsi_id', $request->id)
            ->orderBy('id')
            ->get();
        return $kabupaten;
    }
}
