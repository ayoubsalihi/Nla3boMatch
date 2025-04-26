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
    return response()->json($images);
   }

   public function show(Image $image)
   {
    return response()->json($image);
   }

    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->validated());

        return response()->json([
            'message' => 'Image bien enregistrer',
            'data' => $image
        ], 201);
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->validated());

        return response()->json([
            'message' => 'Image bien modifier',
            'data' => $image
        ], 200);
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return response()->json([
            'message' => 'Image bien supprimer'
        ], 200);
    }
}
