<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Panchayat;
use App\Models\Tehsil;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function getCitiesByStateId($stateId)
    {
        //$stateId = $request->query('state_id');
        if (!$stateId) {
            return response()->json(['error' => 'State ID is required'], 400);
        }

        $cities = City::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json($cities);
    }

    public function getDistrictsByCityId($cityId)
    {
        if (!$cityId) {
            return response()->json(['error' => 'City ID is required'], 400);
        }
        $cities = District::where('city_id', $cityId)->get([
            'id',
            'name'
        ]);
        return response()->json($cities);
    }

    public function getTehsilsByDistrictId($districtId)
    {
        if (!$districtId) {
            return response()->json(['error' => 'District ID is required'], 400);
        }
        $tehsils = Tehsil::where('district_id', $districtId)->get([
            'id',
            'name'
        ]);
        return response()->json($tehsils);
    }

    public function getPanchayatsByTehsilId($tehsilId)
    {
        if (!$tehsilId) {
            return response()->json(['error' => 'Tehsil ID is required'], 400);
        }
        $panchayats = Panchayat::where('tehsil_id', $tehsilId)->get([
            'id',
            'name'
        ]);
        return response()->json($panchayats);
    }

    public function getWardsByPanchayatId($panchayatId)
    {
        if (!$panchayatId) {
            return response()->json(['error' => 'Panchayat ID is required'], 400);
        }
        $wards = Ward::where('panchayat_id', $panchayatId)->get([
            'id',
            'name'
        ]);
        return response()->json($wards);
    }
}
