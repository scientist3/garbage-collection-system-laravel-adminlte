<?php

namespace App\Http\Controllers;

use App\Models\GarbageCollection;
use Illuminate\Http\Request;

class GarbageCollectionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'household_id' => 'required|exists:households,id',
            'garbage_type' => 'required|in:wet,dry,both',
            'photo' => 'required|image',
            'geo_location' => 'required',
        ]);

        $data['photo'] = $request->file('photo')->store('photos');
        $data['collected_at'] = now();

        $garbageCollection = GarbageCollection::create($data);

        return response()->json($garbageCollection);
    }
}
