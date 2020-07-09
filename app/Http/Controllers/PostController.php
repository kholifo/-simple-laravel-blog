<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index(Request $request)
    {
        $posts = Post::latest()
            ->simplePaginate(4);
        return view('welcome', ['posts' => $posts]);
    }

    public function create()
    {
        if (Auth::user()){
            $post = new Post();
            return view('post.create', compact('post'));
        }
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:posts',
            'body' => 'required|min:100',
        ]);

        $request->user()->posts()->create([
            'name' => $request->name,
            'body' => $request->body
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $data = $this->validate($request, [
            'name' => 'required|unique:posts,name,' . $post->id,
            'body' => 'required|min:100',
        ]);

        $post->fill($data);
        $post->save();
        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);
        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('success', 'Post removed successfully');
    }
}
