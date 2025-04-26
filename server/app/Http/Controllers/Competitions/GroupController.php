<?php

namespace App\Http\Controllers\Competitions;

use App\Http\Requests\Competitions\StoreGroupRequest;
use App\Http\Requests\Competitions\UpdateGroupRequest;
use App\Models\Competitions\Group;
use Illuminate\Routing\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    public function show(Group $group)
    {
        return response()->json($group);
    }


    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->validated());
        return response()->json(['message' => 'Group bien enregistrer', 'group' => $group]);
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return response()->json(['message' => 'Group bien modifier', 'group' => $group]);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json(['message' => 'Group bien supprimer']);
    }
}
