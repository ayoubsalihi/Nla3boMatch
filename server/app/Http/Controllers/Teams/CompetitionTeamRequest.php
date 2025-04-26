<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\UpdateCompetitionRequest;
use App\Http\Requests\Teams\StoreCompetitionTeamRequest;
use App\Models\Teams\CompetitionTeam;
use Illuminate\Http\Request;

class CompetitionTeamRequest extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitionTeam = CompetitionTeam::all();
        return response()->json($competitionTeam);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetitionTeamRequest $request)
    {
        $competitionTeam = CompetitionTeam::create($request->validated());
        return response()->json([
            'message' => 'CompetitionTeam created successfully',
            'competitionTeam' => $competitionTeam,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionTeam $competitionTeam)
    {
        return response()->json($competitionTeam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetitionRequest $request, CompetitionTeam $competitionTeam)
    {
        $competitionTeam->update($request->validated());
        return response()->json([
            'message' => 'CompetitionTeam updated successfully',
            'competitionTeam' => $competitionTeam,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionTeam $competitionTeam)
    {
        $competitionTeam->delete();
        return response()->json([
            'message' => 'CompetitionTeam deleted successfully',
        ]);
    }
}
