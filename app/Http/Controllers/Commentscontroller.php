<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Auth;

class Commentscontroller extends Controller
{
    public function store(Post $post)
    {
        //
            $post->comments()->create([
            'body' => request('body'),

            'user_id' => Auth::user()->id



            ]);

        return back();
    }
}
