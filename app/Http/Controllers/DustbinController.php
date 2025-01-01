<?php

namespace App\Http\Controllers;

use App\Models\Dustbins;
use App\Models\DustbinTypes;
use App\Models\House;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DustbinController extends Controller
{
    public function index()
    {

        $dustbins = Dustbins::with(['dustbinType', 'house'])->orderBy('dustbin_code', 'ASC')->get();
        $dustbinTypes = DustbinTypes::all();
        $houses = House::all();
        $dustbin_code = strtoupper(preg_replace('/[^A-Z0-9]/', 'D', Str::random(20)));

        return view('dustbins.index', compact('dustbins', 'dustbinTypes', 'houses', 'dustbin_code'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dustbin_code' => 'required|string|max:255|unique:dustbins,dustbin_code',
            'dustbin_type_id' => 'required|exists:dustbin_types,id',
            'houses_id' => 'required|exists:houses,id',
            'geo_coordinates' => 'required|string|max:255',
        ]);

        try {
            Dustbins::create($data);
            return redirect()->route('admin.dustbins.index')->with('success', 'Dustbin created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create dustbin. Please try again.']);
        }
    }

    public function show($dustbin_code)
    {
        $dustbin = Dustbins::with(['dustbinType', 'house'])->where('dustbin_code', decrypt($dustbin_code))->firstOrFail();

        // Generate QR code for the dustbin
        //$dustbin->qrcode = $this->genrateQrCode(decrypt($dustbin_code));
        // $dustbin->qrcode = '<img src="data:image/png;base64,' . base64_encode($str) . '">';
        return view('dustbins.show', compact('dustbin'));
    }

    public function edit($dustbin_code)
    {
        $dustbin = Dustbins::with(['dustbinType', 'house'])->where('dustbin_code', decrypt($dustbin_code))->firstOrFail();
        $dustbinTypes = DustbinTypes::all();
        $houses = House::all();

        $dustbins = Dustbins::with(['dustbinType', 'house'])->orderBy('dustbin_code', 'ASC')->get();

        // $dustbin_code = strtoupper(preg_replace('/[^A-Z0-9]/', 'D', Str::random(20)));

        // return view('dustbins.index', compact('dustbins', 'dustbinTypes', 'houses', 'dustbin_code'));
        return view('dustbins.index', compact('dustbin', 'dustbinTypes', 'houses', 'dustbins'));
    }

    // public function edit(DustbinTypes $dustbinType)
    // {
    //     return view('dustbin_types.edit', compact('dustbinType'));
    // }

    public function update(Request $request, $dustbin_code)
    {
        $data = $request->validate([
            'dustbin_code' => 'required|string|max:255',
            'dustbin_type_id' => 'required|exists:dustbin_types,id',
            'houses_id' => 'required|exists:houses,id',
            'geo_coordinates' => 'required|string|max:255',
        ]);

        $dustbin = Dustbins::where('dustbin_code', $dustbin_code)->firstOrFail();
        $dustbin->update($data);

        return redirect()->route('admin.dustbins.index')->with('success', 'Dustbin updated successfully.');
    }

    public function destroy($dustbin_code)
    {
        $dustbin = Dustbins::where('dustbin_code', $dustbin_code)->firstOrFail();
        $dustbin->delete();

        return redirect()->route('admin.dustbins.index')->with('success', 'Dustbin deleted successfully.');
    }

    // I want to check if the dustbin_code is already present in the database
    public function checkDustbinCode(Request $request)
    {
        // print_r($request->all());
        // die();
        // $data = $request->validate([
        //     'dustbin_code' => 'required|string|max:255',
        // ]);

        // $dustbin = Dustbins::where('dustbin_code', 'DB001')->first();
        // if ($dustbin) {
        //     return response()->json(['status' => 'error', 'message' => 'Dustbin code already exists.'], 200);
        // } else {

        //     return response()->json(['status' => 'success', 'message' => 'Dustbin code is available.'], 200);
        // }

        // Use Validator facade for custom validation handling
        $validator = Validator::make($request->all(), [
            'dustbin_code' => 'required|string|max:255',
        ]);

        // If validation fails, return a JSON error response
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422); // 422 Unprocessable Entity
        }

        // Proceed to check if the dustbin code exists
        $dustbin = Dustbins::where('dustbin_code', $request->dustbin_code)->first();

        if ($dustbin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dustbin code already exists.',
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Dustbin code is available.',
            ], 200);
        }
    }

    private function genrateQrCode($dustbin_code)
    {
        $from = [255, 0, 0];
        $to = [0, 0, 255];
        return  QrCode::size(100)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->generate($dustbin_code,);
    }
}
