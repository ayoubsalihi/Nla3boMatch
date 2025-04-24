<?php

namespace App\Http\Controllers;

use App\Http\Requests\Competitions\StorePartidoTeamRequest;
use App\Http\Requests\Competitions\UpdatePartidoTeamRequest;
use App\Models\Competitions\Compete;

class PartidoTeamController extends Controller
{
    public function index()
    {
        $records = Compete::all();
        return response()->json($records);
    }

    public function show($id)
    {
        $record = Compete::findOrFail($id);
        return response()->json($record);
    }

    public function store(StorePartidoTeamRequest $request)
    {
        $record = Compete::create($request->validated());
        return response()->json(['message' => 'Équipe ajoutée au match avec succès.','data' => $record]);
    }

    public function update(UpdatePartidoTeamRequest $request, $id)
    {
        $record = Compete::findOrFail($id);
        $record->update($request->validated()); 
        return response()->json(['message' => 'Relation match-équipe mise à jour avec succès.','data' => $record]);
    }

    public function destroy($id)
    {
        $record = Compete::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Relation match-équipe supprimée avec succès.']);
    }
}
