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
    return view('posts.index', compact('posts'));
}

public function show($id)
{
    $post = Post::findOrFail($id);
    return view('posts.show', compact('post'));
}

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'description' => $request->description,
            'type_post' => $request->type_post,
            'user_id' => $request->user_id,
            'partido_id' => $request->partido_id,
            'competition_id' => $request->competition_id,
        ]);

        return response()->json([
            'message' => 'Post bien enregistrer',
            'data' => $post
        ], 201);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'description' => $request->description,
            'type_post' => $request->type_post,
            'user_id' => $request->user_id,
            'partido_id' => $request->partido_id,
            'competition_id' => $request->competition_id,
        ]);

        return response()->json([
            'message' => 'Post bien modifier',
            'data' => $post
        ], 200);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'Post bien supprimer'
        ], 200);
    }
}
