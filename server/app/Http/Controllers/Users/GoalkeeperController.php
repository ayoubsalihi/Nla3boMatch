<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreGoalkeeperRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Users\Goalkeeper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GoalkeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',Goalkeeper::class);
        $goalkeeper = Goalkeeper::all();
        return response()->json($goalkeeper);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoalkeeperRequest $request)
    {
        Gate::authorize('create',Goalkeeper::class);
        $goalkeeper = Goalkeeper::create($request->validated());
        return response()->json([
            'message' => 'Goalkeeeper created successfully',
            'player' => $goalkeeper,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Goalkeeper $goalkeeper)
    {
        Gate::authorize('viewAny',$goalkeeper);
        return response()->json($goalkeeper);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Goalkeeper $goalkeeper)
    {
        Gate::authorize('update',$goalkeeper);
        $goalkeeper->update($request->validated());
        return response()->json([
            "message" => "Goalkeeper updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goalkeeper $goalkeeper)
    {
        Gate::authorize('viewAny',$goalkeeper);
        $goalkeeper->delete();
        return response()->json([
            "message" => "Goalkeeper deleted successfully",
        ]);
    }
}
