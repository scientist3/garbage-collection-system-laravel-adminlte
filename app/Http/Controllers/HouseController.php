<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HouseController extends Controller
{
    public function index()
    {
        $households = House::orderBy('id', 'DESC')->get();
        return view('houses.index', compact('households'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'state' => 'required',
            'district' => 'required',
            'tensil' => 'required',
            'panchayat' => 'required',
            'ward' => 'required',
            'village' => 'required',
            'house_owner_name' => 'required',
            'parentage' => 'required',
            'phone_no' => 'required',
            'location' => 'required',
        ]);

        $household = House::create($data);

        // Generate QR codes for wet and dry garbage
        // $household->wet_garbage_qr = QrCode::generate('Wet Garbage: ' . $household->id);
        // $household->dry_garbage_qr = QrCode::generate('Dry Garbage: ' . $household->id);
        $household->save();

        return redirect()->route('house.index')->with('success', 'Household created successfully.');
    }

    public function show($id)
    {
        // Fetching house with custom query and joins (if needed)
        $house = House::select(
            'houses.*',
            'states.name as state',
            'cities.name as city',
            'districts.name as district',
            'tehsils.name as tehsil',
            'panchayats.name as panchayat',
            'wards.name as ward'
        )
            ->join('states', 'houses.state_id', '=', 'states.id')
            ->join('cities', 'houses.city_id', '=', 'cities.id')
            ->join('districts', 'houses.district_id', '=', 'districts.id')
            ->join('tehsils', 'houses.tehsil_id', '=', 'tehsils.id')
            ->join('panchayats', 'houses.panchayat_id', '=', 'panchayats.id')
            ->join('wards', 'houses.ward_id', '=', 'wards.id')
            ->where('houses.id', $id)
            ->firstOrFail();
        echo "<pre>";
        print_r($house);
        echo "</pre>";
        // die();
        // $house = House::findOrFail($house->id);
        return view('houses.show', compact('house'));
    }

    public function edit(House $house)
    {
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, House $house)
    {
        $data = $request->validate([
            'state' => 'required',
            'district' => 'required',
            'tensil' => 'required',
            'panchayat' => 'required',
            'ward' => 'required',
            'village' => 'required',
            'house_owner_name' => 'required',
            'parentage' => 'required',
            'phone_no' => 'required',
            'location' => 'required',
        ]);

        $house->update($data);

        return redirect()->route('house.index')->with('success', 'Household updated successfully.');
    }

    public function destroy(House $house)
    {
        $house->delete();

        return redirect()->route('house.index')->with('success', 'Household deleted successfully.');
    }
}
