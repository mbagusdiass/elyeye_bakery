<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {$limit = Post::where('discount', '>', 0)->orderBy('discount', 'DESC')->paginate(2);
        $posts = Post::latest()->get();
        $categories = Category::latest()->get();
        return view('welcome', compact('posts','categories', 'limit'));

    }
}
