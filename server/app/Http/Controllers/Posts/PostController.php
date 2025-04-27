<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function index()
{
    Gate::authorize('viewAny',Post::class);
    $posts = Post::all();
    return response()->json($posts);
}

public function show(Post $post)
{
    Gate::authorize('view',Post::class);
    return response()->json($post);
}

    public function store(StorePostRequest $request)
    {
        Gate::authorize('create',Post::class);
        $post = Post::create($request->validated());
        return response()->json([
            'message' => 'Post bien enregistrer',
            'data' => $post
        ], 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update',Post::class);
        $post->update($request->validated());

        return response()->json([
            'message' => 'Post bien modifier',
            'data' => $post
        ], 200);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete',Post::class);
        $post->delete();

        return response()->json([
            'message' => 'Post bien supprimer'
        ], 200);
    }
}
