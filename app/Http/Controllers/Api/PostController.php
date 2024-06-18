<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PostRequest;

use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postView()
    {
        return PostResource::collection(Post::latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePost(PostRequest $request)
    {
        // $result = Survey::create($request->validated());

        $post = new Post();
        $post->user_id = Auth::id();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->desc = $request->desc;

        // Handle the upload Image with webp format
        $image=$request->file('image');
        $imagePath = $image->getRealPath();

        // Encode to Webp format with quality 80
        $img = Image::make($imagePath)->encode('webp', 80);

        $fileName = time() . '_' . uniqid() . '.webp';
        $image->move('postimage', $fileName, (string) $img);
        $fileNames = $fileName;
        $post->image = $fileNames;

        $post->save();

        return new PostResource($post);
    }

    /**
     * show the specified resource to update.
     */
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePost(PostRequest $request, $id)
    {
        $post = Post::find($id);

        // delete the old image
        $image = $post->image;
        File::delete(public_path('postimage/' . $image));

        $post->user_id = Auth::id();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->desc = $request->desc;

        // Handle the upload Image with webp format
        $image=$request->file('image');
        $imagePath = $image->getRealPath();

        // Encode to Webp format with quality 80
        $img = Image::make($imagePath)->encode('webp', 80);

        $fileName = time() . '_' . uniqid() . '.webp';
        $image->move('postimage', $fileName, (string) $img);
        $fileNames = $fileName;
        $post->image = $fileNames;

        $post->update();

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        
        // Delete the old image from storage
        $image = $post->image;
        File::delete(public_path('postimage/' . $image));

        $post->delete();

        return response('', 204);
    }
}
