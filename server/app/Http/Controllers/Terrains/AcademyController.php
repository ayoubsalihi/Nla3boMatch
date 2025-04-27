<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreAcademyRequest;
use App\Http\Requests\Terrains\UpdateAcademyRequest;
use App\Models\Terrains\Academy;
use Illuminate\Support\Facades\Gate;

class AcademyController extends Controller
{
   
    public function index1()
    {
        Gate::authorize('viewAny',Academy::class);
        $academies = Academy::all();
        return response()->json($academies);    
    }

    public function show(Academy $academy)
    {
        Gate::authorize('view',$academy);
        return response()->json($academy);
    }

    public function store(StoreAcademyRequest $request)
    {
        Gate::authorize('create',Academy::class);
        $academy = Academy::create($request->validated());
        return response()->json($academy, 201);
    }


    public function update(UpdateAcademyRequest $request, Academy $academy)
    {
        Gate::authorize('update',Academy::class);
        $academy->update($request->validated());
        return response()->json($academy);
    }

    public function destroy(Academy $academy)
    {
        Gate::authorize('delete',Academy::class);
        $academy->delete();
        return response()->json(['message' => 'Académie supprimée avec succès.']);
    }
}
