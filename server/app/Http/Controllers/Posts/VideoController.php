<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreVideoRequest;
use App\Http\Requests\Posts\UpdateVideoRequest;
use App\Models\Posts\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
{
    Gate::authorize('viewAny',Video::class);
    $videos = Video::all();
    return response()->json($videos);
}

public function show(Video $video)
{
    Gate::authorize('view',Video::class);
    return response()->json($video);
}

    
    public function store(StoreVideoRequest $request)
    {
        Gate::authorize('create',Video::class);
        $video = Video::create($request->validated());

        return response()->json([
            'message' => 'Video bien enregistrer',
            'data' => $video
        ], 201);
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        Gate::authorize('update',Video::class);
        $video->update($request->validated());
        

        return response()->json([
            'message' => 'Video bien modifier',
            'data' => $video
        ], 200);
    }

    public function destroy(Video $video)
    {
        Gate::authorize('elete',Video::class);

        $video->delete();

        return response()->json([
            'message' => 'Video bien supprimer'
        ], 200);
    }
}
