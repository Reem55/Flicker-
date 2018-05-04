<?php

namespace App;
use App\Models\User;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {

      $this->comments()->create(compact('body'));

    }

}





