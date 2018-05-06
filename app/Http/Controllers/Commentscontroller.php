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


    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body'=>'required',
        ]);
        $comment->update($request->all());
        // Redirect
        return back()->with('sucess', 'comment has updated succefully');
    }
    public function edit(Comment $comment){
        return view('comments.edit', compact('comment'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }
}
