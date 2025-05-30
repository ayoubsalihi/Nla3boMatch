<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view',$user);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Gate::authorize('update',$user);
        $user->update($request->validated());
        return response()->json([
            'message' => 'User update successfully',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete',$user);
        $user->delete();
        return response()->json([
            'message'=> 'User deleted successfully',
        ]);
    }

    public function get_current(){
        $user = auth()->user();
        $user->load(['player','admin']); // Eager load relationships
        return response()->json([
            'user' => $user,
            'owner' => $user->getOwner()
        ]);
    }
}
