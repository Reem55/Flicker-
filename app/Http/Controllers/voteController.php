<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class voteController extends Controller
{
   public function vote(Request $request, Post $post)
   {
       $request->validate([
           'type'=>'required|in:1,-1',
       ]);

       if ($vote = $post->getAuthIsVote()){
           $vote->update([
               'user_id' => $post->id,
               'type' =>$request->type,
           ]);

           return back();
       }
       $post->votes()->create([
           'user_id'=> auth()->user()->id,
         'type' => $request ->type,
       ]);

       return back();
   }
}
