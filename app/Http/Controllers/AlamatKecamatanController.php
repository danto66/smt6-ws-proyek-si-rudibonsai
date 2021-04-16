<?php

namespace App\Http\Controllers;

use App\Models\AlamatKecamatan;
use Illuminate\Http\Request;

class AlamatKecamatanController extends Controller
{
    public function index(Request $request)
    {
        $kecamatan = AlamatKecamatan::where('kabupaten_id', $request->id)
            ->orderBy('id')
            ->get();
        return $kecamatan;
    }
}
