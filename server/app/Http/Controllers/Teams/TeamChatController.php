<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\StoreTeamChatRequest;
use App\Http\Requests\User\UpdateChatRequest;
use App\Models\Teams\TeamChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',TeamChat::class);
        $teamChat = TeamChat::all();
        return response()->json($teamChat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamChatRequest $request)
    {
        Gate::authorize('create',TeamChat::class);
        $teamChat = teamChat::create($request->validated());
        return response()->json([
            'message' => 'TeamChat created successfully',
            'teamChat' => $teamChat
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamChat $teamChat)
    {
        Gate::authorize('view',$teamChat);
        return response()->json($teamChat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, TeamChat $teamChat)
    {
        Gate::authorize('update',$teamChat);
        return response()->json([
            "message" => "TeamChat can't be updated"
        ],403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamChat $teamChat)
    {
        Gate::authorize('viewAny',$teamChat);
        $teamChat->delete();
        return response()->json([
            'message' => 'TeamChat deleted successfully',
        ]);
    }
}
