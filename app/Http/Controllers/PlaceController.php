<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Place::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:places',
            'city' => 'required',
            'state' => 'required',
        ]);

        $place = Place::create($validatedData);

        return response()->json($place, 201);
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);

        return response()->json($place);
    }

    public function update(Request $request, $id)
    {
        $place = Place::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:places,slug,' . $place->id,
            'city' => 'required',
            'state' => 'required',
        ]);

        $place->update($validatedData);

        return response()->json($place);
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $place->delete();

        return response()->json(null, 204);
    }

    public function searchByName($name)
    {
        $places = Place::where('name', 'like', '%' . $name . '%')->get();

        return response()->json($places);
    }
}
