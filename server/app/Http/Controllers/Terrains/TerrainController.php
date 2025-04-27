<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreTerrainRequest;
use App\Http\Requests\Terrains\UpdateTerrainRequest;
use App\Models\Terrains\Terrain;
use Illuminate\Support\Facades\Gate;

class TerrainController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',Terrain::class);
        $terrains = Terrain::all();
        return view('terrains.index', compact('terrains'));
    }

    public function store(StoreTerrainRequest $request)
    {
        Gate::authorize('create',Terrain::class);
        $terrain = Terrain::create($request->validated());
        return response()->json($terrain, 201);
    }

    public function show(Terrain $terrain)
    {
        Gate::authorize('view',$terrain);
        return view('terrains.show', compact('terrain'));
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        Gate::authorize('update',$terrain);
        $terrain->update($request->validated());
        return response()->json($terrain);
    }

    public function destroy(Terrain $terrain)
    {
        Gate::authorize('delete',$terrain);
        $terrain->delete();
        return response()->json(['message' => 'Terrain supprimé avec succès.']);
    }
}
