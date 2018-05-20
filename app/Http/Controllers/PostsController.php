<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function index()
    {
        $posts = Post::all();

        return view('master', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        auth()->user()->posts()->create($request->all());


        //redirect
        return redirect('/')->with('success', 'post has created succefully');
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->user()->id != $post->user_id) {
            abort(404);
        }

        // validate
        $this->validate($request, [
            'title'=>'required',
            'body' =>'required',
        ]);

        $post->update($request->all());

        // Redirect
        return redirect('/')->with('success', 'post has updated succefully');
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->id != $post->user_id) {
            abort(404);
        }

        $post->delete();

        return redirect('/');
    }

}