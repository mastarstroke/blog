<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function add_post()
    {
        $cates = Category::latest()->get();
        return view('main.post.add', compact('cates'));
    }

    public function store_post(PostRequest $request)
    {
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

        return response()->json(['success' => true]);
    }

    public function edit_posts($id)
    {
        $cates = Category::latest()->get();
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('cates', 'post'));
    }

    public function update_posts(PostRequestEdit $request, $id)
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

        return response()->json(['success' => true]);
    }

    public function delete_posts($id)
    {
        $post = Post::findOrFail($id);
        
        $image = $post->image;
        File::delete(public_path('postimage/' . $image));

        $post->delete();

        return response()->json(['success' => true]);
    }

    public function post_search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%{$search}%")
        ->orWhere('desc', 'like', "%{$search}%")
        ->orWhere('category', 'like', "%{$search}%")->get();

        return view('admin.post.index', compact('posts'));
    }
}
