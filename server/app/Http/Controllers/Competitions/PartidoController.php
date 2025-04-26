<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\StorePartidoRequest;
use App\Http\Requests\Competitions\UpdatePartidoRequest;
use App\Models\Competitions\Partido;

class PartidoController extends Controller
{
    public function index()
    {
        $matches = Partido::all();
        return response()->json($matches);
    }

    public function show(Partido $match)
    {
        return response()->json($match);
    }

    public function store(StorePartidoRequest $request)
    {
        $match = Partido::create($request->validated());
        return response()->json(['message' => 'Match created successfully', 'match' => $match]);
    }

    public function update(UpdatePartidoRequest $request, Partido $match)
    {
        $match->update($request->validated());
        return response()->json(['message' => 'Match updated successfully', 'match' => $match]);
    }

    public function destroy(Partido $match)
    {
        $match->delete();
        return response()->json(['message' => 'Match deleted successfully']);
    }
}
