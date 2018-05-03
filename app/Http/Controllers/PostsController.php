<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index( )
    {

        $posts = Post::latest()->get();
        return view ('master', compact('posts'));
    }


    public function show(Post $post)
    {
        $post =Post::find($id);
        return view ('posts.show',compact('post'));
    }



    public function create()
    {
        return view ('posts.create');
    }


    public function store(Request_$request )
    {

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create(request(['title','body']));

        auth()->user()->posts()->create($request->all));


            //redirect
        return redirect('/')->with('success','post has created succefully');
    }
}
