<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreImageRequest;
use App\Http\Requests\Posts\UpdateImageRequest;
use App\Models\Posts\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index()
   {
    $images = Image::all();
    return view('images.index', compact('images'));
   }

   public function show($id)
{
    $image = Image::findOrFail($id);
    return view('images.show', compact('image'));
}

    public function store(StoreImageRequest $request)
    {
        $image = Image::create([
            'post_id' => $request->post_id,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Image bien enregistrer',
            'data' => $image
        ], 201);
    }

    public function update(UpdateImageRequest $request, $id)
    {
        $image = Image::findOrFail($id);

        $image->update([
            'post_id' => $request->post_id,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Image bien modifier',
            'data' => $image
        ], 200);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        $image->delete();

        return response()->json([
            'message' => 'Image bien supprimer'
        ], 200);
    }
}
