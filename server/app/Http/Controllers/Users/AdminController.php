<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreAdminRequest;
use App\Models\Users\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',Admin::class);
        $admins = Admin::all();
        return response()->json($admins);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        Gate::authorize('create',Admin::class);
        $admin = Admin::create($request->validated());
        return response()->json([
            "message" => "Admin created successfully",
            "admin" => $admin
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        Gate::authorize('view',$admin);
        return response()->json($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        Gate::authorize('update',$admin);
        $admin->update($request->validated());
        return response()->json([
            "message" => "Admin updated successfully",
            "admin" => $admin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        Gate::authorize('viewAny',$admin);
        $admin->delete();
        return response()->json([
            "mesage" => "Admin deleted successfully",
        ]);
    }
}
