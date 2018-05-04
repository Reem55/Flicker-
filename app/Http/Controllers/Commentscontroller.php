<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class Commentscontroller extends Controller
{
    public function store(Post $post)
    {
      $this->validate(request(),['body' => 'required|min:5']);

      $post->addComment(request('body'));

      return back();
    }
}
