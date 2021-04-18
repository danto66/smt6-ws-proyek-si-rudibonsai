<?php

namespace App\Http\Controllers;

use App\Models\AlamatKabupaten;

class AlamatKabupatenController extends Controller
{
    public function index($id)
    {
        $kabupaten = AlamatKabupaten::where('provinsi_id', $id)
            ->orderBy('id')
            ->get();
        return $kabupaten;
    }
}
