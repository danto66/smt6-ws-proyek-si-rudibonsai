<?php

namespace App\Http\Controllers;

use App\Models\AlamatKecamatan;

class AlamatKecamatanController extends Controller
{
    public function index($id)
    {
        $kecamatan = AlamatKecamatan::where('kabupaten_id', $id)
            ->orderBy('id')
            ->get();
        return $kecamatan;
    }
}
