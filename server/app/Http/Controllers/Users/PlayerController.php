<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StorePlayerRequest;
use App\Http\Requests\Users\UpdatePlayerRequest;
use App\Models\Users\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gate::authorize('viewAny',Player::class);
        $players = Player::all();
        return response()->json($players);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        // Gate::authorize('create',Player::class);
        $player = Player::create($request->validated());
        return response()->json([
            "message" => "Player created successfully",
            "player" => $player,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        Gate::authorize('view', $player);
        return response()->json($player);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        Gate::authorize('update',$player);
        $player->update($request->validated());
        return response()->json([
            "message" => "Player have been updated successfully",
            "player" => $player,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        Gate::authorize('delete',$player);
        $player->delete();
        return response()->json([
            "message" => "Player deleted successfully",
        ]);
    }
}
