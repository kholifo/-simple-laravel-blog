<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('name', 'like', '%'.$request->name.'%')->get();
        return view('post.search', compact('posts'));
    }
}
