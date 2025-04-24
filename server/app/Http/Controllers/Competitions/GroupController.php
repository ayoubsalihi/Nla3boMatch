<?php

namespace App\Http\Controllers;

use App\Http\Requests\Competitions\StoreGroupRequest;
use App\Http\Requests\Competitions\UpdateGroupRequest;
use App\Models\Competitions\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('competition')->get();
        return response()->json($groups);
    }

    public function show($id)
    {
        $group = Group::with('competition')->findOrFail($id);
        return response()->json($group);
    }


    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->validated());
        return response()->json(['message' => 'Group bien enregistrer', 'group' => $group]);
    }

    public function update(UpdateGroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->validated());
        return response()->json(['message' => 'Group bien modifier', 'group' => $group]);
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return response()->json(['message' => 'Group bien supprimer']);
    }
}
