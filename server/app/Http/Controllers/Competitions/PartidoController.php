<?php

namespace App\Http\Controllers;

use App\Http\Requests\Competitions\StorePartidoRequest;
use App\Http\Requests\Competitions\UpdatePartidoRequest;
use App\Models\Competitions\Partido;

class PartidoController extends Controller
{
    public function index()
    {
        $matches = Partido::with(['team1', 'team2', 'terrain', 'competition'])->get();
        return response()->json($matches);
    }

    public function show($id)
    {
        $match = Partido::with(['team1', 'team2', 'terrain', 'competition'])->findOrFail($id);
        return response()->json($match);
    }

    public function store(StorePartidoRequest $request)
    {
        $match = Partido::create($request->validated());
        return response()->json(['message' => 'Match created successfully', 'match' => $match]);
    }

    public function update(UpdatePartidoRequest $request, $id)
    {
        $match = Partido::findOrFail($id);
        $match->update($request->validated());
        return response()->json(['message' => 'Match updated successfully', 'match' => $match]);
    }

    public function destroy($id)
    {
        $match = Partido::findOrFail($id);
        $match->delete();
        return response()->json(['message' => 'Match deleted successfully']);
    }
}
