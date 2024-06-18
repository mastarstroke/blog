<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function get_home()
    {
        $categories = Category::inRandomOrder()->get();
        $gen_posts = Post::latest()->paginate(3);
        $sec_posts = Post::oldest()->paginate(3);
        $trendings = Post::where('trending', 'yes')->paginate(6);
        $lg_post = Post::latest()->first();

        $latest_cultures = Post::where('category', 'Culture')->paginate(2);
        $cultures = Post::where('category', 'culture')->inRandomOrder()->take(6)->get();

        $latest_tourisms= Post::where('category', 'Tourism')->latest()->paginate(2);
        $tourisms = Post::where('category', 'Tourism')->inRandomOrder()->take(3)->get();

        // Lifestyle
        $lifestyle_one = Post::where('category', 'lifestyle')->latest()->paginate(3);
        $lifestyle_two = Post::where('category', 'lifestyle')->oldest()->paginate(3);
        $randoms = Post::where('category', 'lifestyle')->inRandomOrder()->take(6)->get();
        $lifestyle = Post::latest()->first();
        return view('main.home', compact('categories', 'gen_posts', 'lg_post', 'sec_posts', 
            'trendings', 'latest_cultures', 'cultures', 'latest_tourisms', 'tourisms',
            'lifestyle_one', 'lifestyle_two', 'randoms', 'lifestyle'));
    }

    public function getdashboard()
    {
        $role = Auth::user()->role;

        if($role=="admin")
        {
            return redirect()->route('admin/dashboard');
        }
        if($role=="user")
        {
            return redirect()->route('user/dashboard');
        }
    }
}
