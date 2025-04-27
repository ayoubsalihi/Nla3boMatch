<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\StorePartidoRequest;
use App\Http\Requests\Competitions\UpdatePartidoRequest;
use App\Models\Competitions\Partido;
use Illuminate\Support\Facades\Gate;

class PartidoController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',Partido::class);
        $matches = Partido::all();
        return response()->json($matches);
    }

    public function show(Partido $match)
    {
        Gate::authorize('view',$match);
        return response()->json($match);
    }

    public function store(StorePartidoRequest $request)
    {
        Gate::authorize('create',Partido::class);
        $match = Partido::create($request->validated());
        return response()->json(['message' => 'Match created successfully', 'match' => $match]);
    }

    public function update(UpdatePartidoRequest $request, Partido $match)
    {
        Gate::authorize('update',$match);
        $match->update($request->validated());
        return response()->json(['message' => 'Match updated successfully', 'match' => $match]);
    }

    public function destroy(Partido $match)
    {
        Gate::authorize('delete',$match);
        $match->delete();
        return response()->json(['message' => 'Match deleted successfully']);
    }
}
