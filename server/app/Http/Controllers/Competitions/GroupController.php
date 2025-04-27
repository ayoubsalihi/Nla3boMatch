<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Requests\Competitions\StoreGroupRequest;
use App\Http\Requests\Competitions\UpdateGroupRequest;
use App\Models\Competitions\Group;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',Group::class);
        $groups = Group::all();
        return response()->json($groups);
    }

    public function show(Group $group)
    {
        Gate::authorize('view',$group);
        return response()->json($group);
    }


    public function store(StoreGroupRequest $request)
    {
        Gate::authorize('create',Group::class);
        $group = Group::create($request->validated());
        return response()->json(['message' => 'Group bien enregistrer', 'group' => $group]);
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        Gate::authorize('update',$group);
        $group->update($request->validated());
        return response()->json(['message' => 'Group bien modifier', 'group' => $group]);
    }

    public function destroy(Group $group)
    {
        Gate::authorize('delete',$group);
        $group->delete();
        return response()->json(['message' => 'Group bien supprimer']);
    }
}
