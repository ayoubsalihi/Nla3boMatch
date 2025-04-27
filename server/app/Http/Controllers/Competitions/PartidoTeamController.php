<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\StorePartidoTeamRequest;
use App\Http\Requests\Competitions\UpdatePartidoTeamRequest;
use App\Models\Competitions\PartidoTeam;
use Illuminate\Support\Facades\Gate;

class PartidoTeamController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',PartidoTeam::class);
        $records = PartidoTeam::all();
        return response()->json($records);
    }

    public function show(PartidoTeam $partidoTeam)
    {
        Gate::authorize('view',$partidoTeam);
        return response()->json($partidoTeam);
    }

    public function store(StorePartidoTeamRequest $request)
    {
        Gate::authorize('create',PartidoTeam::class);
        $record = PartidoTeam::create($request->validated());
        return response()->json(['message' => 'Équipe ajoutée au match avec succès.','data' => $record]);
    }

    public function update(UpdatePartidoTeamRequest $request, PartidoTeam $partidoTeam)
    {
        Gate::authorize('update',$partidoTeam);
        $partidoTeam->update($request->validated()); 
        return response()->json(['message' => 'Relation match-équipe mise à jour avec succès.','data' => $partidoTeam]);
    }

    public function destroy(PartidoTeam $partidoTeam)
    {
        Gate::authorize('delete',$partidoTeam);
        $partidoTeam->delete();
        return response()->json(['message' => 'Relation match-équipe supprimée avec succès.']);
    }
}
