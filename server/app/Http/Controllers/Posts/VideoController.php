<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreVideoRequest;
use App\Http\Requests\Posts\UpdateVideoRequest;
use App\Models\Posts\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
{
    $videos = Video::all();
    return view('videos.index', compact('videos'));
}

public function show($id)
{
    $video = Video::findOrFail($id);
    return view('videos.show', compact('video'));
}

    
    public function store(StoreVideoRequest $request)
    {
        $path = $request->file('file')->store('videos', 'public');

        $video = Video::create([
            'post_id' => $request->post_id,
            'file_path' => $path, 
        ]);

        return response()->json([
            'message' => 'Video bien enregistrer',
            'data' => $video
        ], 201);
    }

    public function update(UpdateVideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::delete($video->file_path);

            $path = $request->file('file')->store('videos', 'public');

            $video->update([
                'file_path' => $path,
            ]);
        }

        return response()->json([
            'message' => 'Video bien modifier',
            'data' => $video
        ], 200);
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        Storage::delete($video->file_path);

        $video->delete();

        return response()->json([
            'message' => 'Video bien supprimer'
        ], 200);
    }
}
