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

    public function index()
    {
        $posts = Post::all();

        return view('master', compact('posts'));
    }


    public function show(Post $post)
    {
        // Remind me, for what was this line for again??
        // $post = Post::find($id);
     
        return view('posts.show', compact('post'));
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

        // Remind me, for what was this line for again??
        // Post::create(request(['title', 'body']));


        //redirect
        return redirect('/posts')->with('success', 'post has created succefully');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // bad-practice, better to use policy
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
        // bad-practice, where is the flash-message?? did you eat it??
        return redirect()->route('posts.update', $post);
    }
    public function destroy(Post $post)
    {
        if (auth()->user()->id != $post->user_id) {
            abort(404);
        }

        $post->delete();

        // bad-practice, where is the flash-message?? did you eat it??
        return redirect('/');
    }

}