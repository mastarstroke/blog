<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $commentCount = Comment::all()->count();
        $countPosts = Post::all()->count();
        $countCategory = Post::all()->count();
        $countUsers = User::all()->count();
        // $countUser=User::where('role_id', 0)->count();
        $posts = Post::latest()->paginate(5);
        $category = Category::latest()->paginate(5);
        return view('admin.dashboard', compact('posts','category','commentCount','countPosts', 'countCategory', 'countUsers'));
    }
}
