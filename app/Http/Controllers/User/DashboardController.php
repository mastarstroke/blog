<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function user_dashboard()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(10);
        $allposts = Post::latest()->paginate(10);
        return view('user.dashboard', compact('posts', 'allposts'));
    }
}
