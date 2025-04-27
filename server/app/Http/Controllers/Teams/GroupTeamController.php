<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\StoreGroupTeamRequest;
use App\Http\Requests\Teams\UpdateGroupTeamRequest;
use App\Models\Teams\GroupTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GroupTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',GroupTeam::class);
        $groupTeams = GroupTeam::all();
        return response()->json($groupTeams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupTeamRequest $request)
    {
        Gate::authorize('store',GroupTeam::class);
        $groupTeam = GroupTeam::create($request->validated());
        return response()->json([
            'message' => 'GroupTeam created successfully',
            'groupTeam' => $groupTeam,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupTeam $groupTeam)
    {
        Gate::authorize('view',$groupTeam);
        return response()->json($groupTeam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupTeamRequest $request, GroupTeam $groupTeam)
    {
        Gate::authorize('update',$groupTeam);
        $groupTeam->update($request->validated());
        return response()->json([
            'message' => 'GroupTeam updated successfully',
            'groupTeam' => $groupTeam,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupTeam $groupTeam)
    {
        Gate::authorize('delete',$groupTeam);
        $groupTeam->delete();
        return response()->json([
            'message' => 'GroupTeam deleted successfully',
        ]);
    }
}
