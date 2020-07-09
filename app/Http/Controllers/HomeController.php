<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth');
        $this->posts = $posts;
    }

    public function index(Request $request)
    {
        return view('home', [
            'posts' => $this->posts->forUser($request->user()),
        ]);
    }
}
