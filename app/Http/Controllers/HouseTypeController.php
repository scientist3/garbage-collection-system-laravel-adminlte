<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;

class HouseTypeController extends Controller
{
    public function index()
    {
        // Fetch house types with pagination
        $houseTypes = HouseType::paginate(10);

        // Pass house types and a null houseType for Create form
        return view('houseTypes.index', compact('houseTypes'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:house_types,name',
        ]);

        // Create the new house type
        HouseType::create($data);

        // Redirect back with success message
        return redirect()->route('admin.house_type.index')->with('success', 'House Type created successfully.');
    }

    public function edit(HouseType $houseType)
    {
        // Fetch house types with pagination
        $houseTypes = HouseType::paginate(10);

        // Return the index view with house types and the house type being edited
        return view('houseTypes.index', compact('houseTypes', 'houseType'));
    }

    public function update(Request $request, HouseType $houseType)
    {
        // Validate the input
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:house_types,name,' . $houseType->id,
        ]);

        // Update the house type
        $houseType->update($data);

        // Redirect back with success message
        return redirect()->route('admin.house_type.index')->with('success', 'House Type updated successfully.');
    }

    public function destroy(HouseType $houseType)
    {
        // Delete the house type
        $houseType->delete();

        // Redirect back with success message
        return redirect()->route('admin.house_type.index')->with('success', 'House Type deleted successfully.');
    }
}
