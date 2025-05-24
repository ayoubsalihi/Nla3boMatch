<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreMessageRequest;
use App\Http\Requests\Users\UpdateMessageRequest;
use App\Models\Users\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',Message::class);
        $messages = Message::all();
        return response()->json($messages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        Gate::authorize('create',Message::class);
        $message = Message::create($request->validated());
        return response()->json([
            'message' => 'Message created successfully',
            'messagee' => $message,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        Gate::authorize('view',$message);
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        Gate::authorize('update',$message);
        $message->update($request->validated());
        return response()->json([
            "message" => "Message updated successfully",
            "your mesage" => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        Gate::authorize('delete',$message);
        $message->delete();
        return response()->json([
            "success message" => "message deleted successfully",
        ]);
    }
}
