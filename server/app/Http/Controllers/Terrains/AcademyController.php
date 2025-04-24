<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreAcademyRequest;
use App\Http\Requests\Terrains\UpdateAcademyRequest;
use App\Models\Terrains\Academy;

class AcademyController extends Controller
{
   
    public function index1()
    {
        $academies = Academy::all();
        return view('academies.index', compact('academies'));
    }

    public function show($id)
    {
        $academy = Academy::findOrFail($id);
        return view('academies.show', compact('academy'));
    }

    public function store(StoreAcademyRequest $request)
    {
        $academy = Academy::create($request->validated());
        return response()->json($academy, 201);
    }


    public function update(UpdateAcademyRequest $request, $id)
    {
        $academy = Academy::findOrFail($id);
        $academy->update($request->validated());
        return response()->json($academy);
    }

    public function destroy($id)
    {
        $academy = Academy::findOrFail($id);
        $academy->delete();
        return response()->json(['message' => 'Académie supprimée avec succès.']);
    }
}
