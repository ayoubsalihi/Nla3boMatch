<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreTerrainRequest;
use App\Http\Requests\Terrains\UpdateTerrainRequest;
use App\Models\Terrains\Terrain;

class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::all();
        return view('terrains.index', compact('terrains'));
    }

    public function store(StoreTerrainRequest $request)
    {
        $terrain = Terrain::create($request->validated());
        return response()->json($terrain, 201);
    }

    public function show($id)
    {
        $terrain = Terrain::findOrFail($id);
        return view('terrains.show', compact('terrain'));
    }

    public function update(UpdateTerrainRequest $request, $id)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain->update($request->validated());
        return response()->json($terrain);
    }

    public function destroy($id)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain->delete();
        return response()->json(['message' => 'Terrain supprimé avec succès.']);
    }
}
