<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreChatRequest;
use App\Models\Users\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',Chat::class);
        $chats = Chat::all();
        return response()->json($chats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        Gate::authorize('create',Chat::class);
        $chat = Chat::create($request->validated());
        return response()->json([
            'message' => 'Chat created successfully',
            'chat' => $chat,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        Gate::authorize('view',$chat);
        return response()->json($chat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        Gate::authorize('update',$chat);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        Gate::authorize('delete',$chat);
        $chat->delete();
        return response()->json([
            'message' => 'Chat deleted successfully',
        ]);
    }
}
