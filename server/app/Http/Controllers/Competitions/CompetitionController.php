<?php

namespace App\Http\Controllers;

use App\Http\Requests\Competitions\StoreCompetitionRequest;
use App\Http\Requests\Competitions\UpdateCompetitionRequest;
use App\Models\Competitions\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::all();
        return response()->json($competitions);
    }

    public function show($id)
    {
        $competition = Competition::findOrFail($id);
        return response()->json($competition);
    }

    public function store(StoreCompetitionRequest $request)
    {
        $competition = Competition::create($request->validated());
        return response()->json(['message' => 'competition bien enregistrer','competition' => $competition]);
    }

    public function update(UpdateCompetitionRequest $request, $id)
    {
        $competition = Competition::findOrFail($id);
        $competition->update($request->validated());
        return response()->json(['message' => 'competition bien modifier','competition' => $competition]);
    }

    public function destroy($id)
    {
        $competition = Competition::findOrFail($id);
        $competition->delete();
        return response()->json(['message' => 'competition bien supprimer']);
    }
}
