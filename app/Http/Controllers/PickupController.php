<?php

namespace App\Http\Controllers;

use App\Models\Dustbins;
use Illuminate\Http\Request;
use App\Models\Pickup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PickupController extends Controller
{
    public function scan($code)
    {
        $dustbin = Dustbins::with(['dustbinType', 'house'])->where('dustbin_code', decrypt($code))->firstOrFail();

        $existingPickup = Pickup::where('dustbin_code', $dustbin->dustbin_code)
            ->whereDate('pickup_datetime', Carbon::today())
            ->first();

        if ($existingPickup) {
            return redirect()->route('pickup.index')->with('error', 'Pickup for this dustbin code has already been recorded today.');
        }

        return view('pickups.scan', compact('dustbin'));
    }

    // Display a listing of the resource.
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() == 'admin') {
            $pickups = Pickup::all();
        } else {
            $pickups = Pickup::where('scanned_by', auth()->user()->id)->get();
        }
        // $pickups = Pickup::with(['house'])->get();
        return view('pickups.index', compact('pickups'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('pickups.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'dustbin_code' => 'required',
            'scanned_by' => 'required',
            'segregation_option' => 'required',
            'segregation_types' => 'array',
            // ...other validation rules...
        ]);

        $existingPickup = Pickup::where('dustbin_code', $request->dustbin_code)
            ->whereDate('pickup_datetime', Carbon::today())
            ->first();

        if ($existingPickup) {
            return redirect()->route('pickup.index')->with('error', 'Pickup for this dustbin code has already been recorded today.');
        }

        $pickupData = $request->all();
        $pickupData['pickup_datetime'] = Carbon::now();

        Pickup::create($pickupData);
        return redirect()->route('pickup.index')->with('success', 'Pickup created successfully.');
    }

    // Display the specified resource.
    public function show(Pickup $pickup)
    {
        return view('pickups.show', compact('pickup'));
    }

    // Show the form for editing the specified resource.
    public function edit(Pickup $pickup)
    {
        return view('pickups.edit', compact('pickup'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Pickup $pickup)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            // ...other validation rules...
        ]);

        $pickup->update($request->all());
        return redirect()->route('pickup.index')->with('success', 'Pickup updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Pickup $pickup)
    {
        $pickup->delete();
        return redirect()->route('pickup.index')->with('success', 'Pickup deleted successfully.');
    }
}
