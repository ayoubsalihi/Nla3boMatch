<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\StorePartidoTeamRequest;
use App\Http\Requests\Competitions\UpdatePartidoTeamRequest;
use App\Models\Competitions\PartidoTeam;

class PartidoTeamController extends Controller
{
    public function index()
    {
        $records = PartidoTeam::all();
        return response()->json($records);
    }

    public function show(PartidoTeam $partidoTeam)
    {
        return response()->json($partidoTeam);
    }

    public function store(StorePartidoTeamRequest $request)
    {
        $record = PartidoTeam::create($request->validated());
        return response()->json(['message' => 'Équipe ajoutée au match avec succès.','data' => $record]);
    }

    public function update(UpdatePartidoTeamRequest $request, PartidoTeam $partidoTeam)
    {
        $partidoTeam->update($request->validated()); 
        return response()->json(['message' => 'Relation match-équipe mise à jour avec succès.','data' => $partidoTeam]);
    }

    public function destroy(PartidoTeam $partidoTeam)
    {
        $partidoTeam->delete();
        return response()->json(['message' => 'Relation match-équipe supprimée avec succès.']);
    }
}
