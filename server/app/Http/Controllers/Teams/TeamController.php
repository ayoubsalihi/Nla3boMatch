<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\StoreTeamRequest;
use App\Http\Requests\Teams\UpdateTeamRequest;
use App\Models\Teams\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',Team::class);
        $teams = Team::all();
        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        Gate::authorize('create',Team::class);
        $team = Team::create($request->validated());
        return response()->json([
            "message" => "Team created successfully",
            "team" => $team
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        Gate::authorize('view',$team);
        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        Gate::authorize('update',$team);
        $team->update($request->validated());
        return response()->json([
            "message" => "Team updated successfully",
            "team" => $team
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Gate::authorize('delete',$team);
        $team->delete();
    }
}
