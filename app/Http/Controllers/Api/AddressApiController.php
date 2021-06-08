<?php

namespace App\Http\Controllers\Api;

use App\Models\Address\City;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use App\Models\Address\Subdistrict;
use App\Http\Controllers\Controller;

class AddressApiController extends Controller
{
    public function getProvinces()
    {
        return Province::all();
    }

    public function getCitiesByProvinceId($id)
    {
        $city = City::where('province_id', $id)
            ->orderBy('city_id')
            ->get();

        return $city;
    }

    public function getSubdistrictsByCityId($id)
    {
        $subdistrict = Subdistrict::where('city_id', $id)
            ->orderBy('subdistrict_id')
            ->get();

        return $subdistrict;
    }
}
