<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post_view()
    {
        $posts = Post::latest()->get();
        return view('user.post.index', compact('posts'));
    }

    public function add_post()
    {
        $categories = Category::inRandomOrder()->get();
        $cates = Category::latest()->get();
        return view('main.post.add', compact('cates','categories'));
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

        return response()->json(['success' => true], 201);
    }

    public function edit_post($id)
    {
        $cates = Category::latest()->get();
        $post = Post::findOrFail($id);
        return view('user.post.edit', compact('cates', 'post'));
    }

    public function update_post(PostRequestEdit $request, $id)
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

    public function post_detail($post)
    {
        $comments = Comment::where('post_id', $post)->latest()->paginate(10);
        // $comment_count = Comment::where('post_id', $post)->count();
        $categories = Category::inRandomOrder()->get();
        $gen_posts = Post::latest()->paginate(3);
        $post = Post::findOrFail($post);
        return view('main.post.details', compact('post', 'categories', 'gen_posts', 'comments'));
    }

    public function post_comment(Request $request)
    {
        if(!Auth::id()){
            return response()->json(['failed' => 'unauthenticated! Please login First.'], 401);            
        }else{
            $comment = new Comment();
            $comment->post_id = $request->post_id;
            $comment->user_id = $request->user_id;
            $comment->comment = $request->comment_message;
            $comment->save();

            // Send comment Notification to post owner
            $email = $comment->posts->users->email;
            $admin = $comment->posts->users->name;
            sendUserPostEmail($email, $user);
    
            return response()->json(['success' => true], 201);
        }

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
