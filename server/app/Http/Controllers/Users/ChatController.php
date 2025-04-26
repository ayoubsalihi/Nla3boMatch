<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreChatRequest;
use App\Models\Users\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::all();
        return response()->json($chats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
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
        return response()->json($chat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();
        return response()->json([
            'message' => 'Chat deleted successfully',
        ]);
    }
}
