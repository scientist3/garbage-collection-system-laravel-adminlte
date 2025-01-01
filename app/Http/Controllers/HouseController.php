<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseType;
use App\Models\State;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HouseController extends Controller
{

    public function index()
    {
        $households = House::orderBy('id', 'DESC')->get();
        $states = State::where('id', '15')->get();
        $house_types = HouseType::orderBy('id', 'DESC')->get();
        return view('houses.index', compact('households', 'states', 'house_types'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'house_type_id' => 'required|exists:house_types,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'tehsil_id' => 'required|exists:tehsils,id',
            'panchayat_id' => 'required|exists:panchayats,id',
            'ward_id' => 'required|exists:wards,id',
            'village' => 'string|max:255',
            'house_owner_name' => 'required|string|max:255',
            'parentage' => 'string|max:255',
            'phone_no' => 'string|max:15',
            'location' => 'string|max:255',
            'account_status' => 'required|in:active,inactive',
        ]);

        $household = House::create($data);

        // Generate QR codes for wet and dry garbage
        // $household->wet_garbage_qr = QrCode::generate('Wet Garbage: ' . $household->id);
        // $household->dry_garbage_qr = QrCode::generate('Dry Garbage: ' . $household->id);
        $household->save();

        return redirect()->route('admin.house.index')->with('success', 'Household created successfully.');
    }

    public function show($id)
    {
        // Fetching house with custom query and joins (if needed)
        $house = House::with([
            'state:id,name',
            'city:id,name',
            'district:id,name',
            'tehsil:id,name',
            'panchayat:id,name',
            'ward:id,name',
            'dustbins:id,dustbin_code,houses_id,dustbin_type_id',
            'dustbins.dustbintype:id,name',
        ])->findOrFail(decrypt($id));

        return view('houses.show', compact('house'));
    }


    public function edit($id)
    {
        $house = House::findOrFail(decrypt($id));
        $households = House::orderBy('id', 'DESC')->get();
        $states = State::where('id', '15')->get();
        $house_types = HouseType::orderBy('id', 'DESC')->get();


        return view('houses.index', compact('house', 'households', 'states', 'house_types'));
    }

    public function update(Request $request, House $house)
    {
        $data = $request->validate([
            'house_type_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'tehsil_id' => 'required',
            'panchayat_id' => 'required',
            'ward_id' => 'required',
            'village' => 'required',
            'house_owner_name' => 'required',
            'parentage' => 'required',
            'phone_no' => 'required',
            'location' => 'required',
        ]);

        $house->update($data);

        return redirect()->route('admin.house.index')->with('success', 'House updated successfully.');
    }

    public function destroy($id)
    {
        $house = House::findOrFail(decrypt($id));
        $house->delete();

        return redirect()->route('admin.house.index')->with('success', 'Household deleted successfully.');
    }
}
