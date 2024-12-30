<?php

namespace App\Http\Controllers;

use App\Models\DustbinTypes;
use Illuminate\Http\Request;

class DustbinTypesController extends Controller
{
    public function index()
    {
        $dustbinTypes = DustbinTypes::orderBy('id', 'ASC')->get();
        return view('dustbin_types.index', compact('dustbinTypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dustbinType = DustbinTypes::create($data);
        return redirect()->route('admin.dustbin_types.index')->with('success', 'Dustbin Type created successfully.');
    }

    // public function show($id)
    // {
    //     $dustbinType = DustbinTypes::findOrFail($id);
    //     return view('dustbin_types.show', compact('dustbinType'));
    // }

    public function edit(DustbinTypes $dustbinType)
    {
        return view('dustbin_types.edit', compact('dustbinType'));
    }

    public function update(Request $request, DustbinTypes $dustbinType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dustbinType->update($data);
        return redirect()->route('admin.dustbin_types.index')->with('success', 'Dustbin Type updated successfully.');
    }

    public function destroy(DustbinTypes $dustbinType)
    {
        $dustbinType->delete();
        return redirect()->route('admin.dustbin_types.index')->with('success', 'Dustbin Type deleted successfully.');
    }
}
