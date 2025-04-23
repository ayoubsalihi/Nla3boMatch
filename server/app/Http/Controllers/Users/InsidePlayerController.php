<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInsidePlayerRequest;
use App\Http\Requests\Users\StoreInsidePlayerRequest;
use App\Models\Users\InsidePlayer;
use Illuminate\Http\Request;

class InsidePlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InsidePlayer = InsidePlayer::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInsidePlayerRequest $request)
    {
        $InsidePlayer = InsidePlayer::create($request->validated());
        return response()->json([
            "message" => "InsidePlayer created successfully",
            "InsidePlayer" => $InsidePlayer,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(InsidePlayer $InsidePlayer)
    {
        return response()->json($InsidePlayer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsidePlayerRequest $request,InsidePlayer $InsidePlayer)
    {
        $InsidePlayer->update($request->validated());
        return response()->json([
            "message" => 'InsidePleyer updated successfully',
            "InsidePlayer" => $InsidePlayer,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InsidePlayer $InsidePlayer)
    {
        $InsidePlayer->delete();
        return response()->json([
            "message" => 'InsidePlayer deleted successfully'
        ]);
    }
}
