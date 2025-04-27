<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competitions\StoreCompetitionRequest;
use App\Http\Requests\Competitions\UpdateCompetitionRequest;
use App\Models\Competitions\Competition;
use Illuminate\Support\Facades\Gate;

class CompetitionController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',Competition::class);
        $competitions = Competition::all();
        return response()->json($competitions);
    }

    public function show(Competition $competition)
    {
        Gate::authorize('view',$competition);
        return response()->json($competition);
    }

    public function store(StoreCompetitionRequest $request)
    {
        Gate::authorize('create',Competition::class);
        $competition = Competition::create($request->validated());
        return response()->json(['message' => 'competition bien enregistrer','competition' => $competition]);
    }

    public function update(UpdateCompetitionRequest $request,Competition $competition)
    {
        Gate::authorize('update',$competition);
        $competition->update($request->validated());
        return response()->json(['message' => 'competition bien modifier','competition' => $competition]);
    }

    public function destroy(Competition $competition)
    {
        Gate::authorize('delete',$competition);
        $competition->delete();
        return response()->json(['message' => 'competition bien supprimer']);
    }
}
