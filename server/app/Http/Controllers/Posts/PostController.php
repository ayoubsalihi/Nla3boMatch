<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Posts\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
{
    $posts = Post::all();
    return response()->json($posts);
}

public function show(Post $post)
{
    return response()->json($post);
}

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return response()->json([
            'message' => 'Post bien enregistrer',
            'data' => $post
        ], 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json([
            'message' => 'Post bien modifier',
            'data' => $post
        ], 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post bien supprimer'
        ], 200);
    }
}
