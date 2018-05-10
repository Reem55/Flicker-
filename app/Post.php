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


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function isCreatedBy(User $user)
    {
        return $this->user_id == $user->id;
    }


    public function scopeGetAll ($q)
    {
        return $this->hasMany(Vote::class);

    }

    public function getAuthIsVote()
    {
        return $this->votes()->where('user_id', auth()->user()->id)->first();
    }

    public function isLikedByAuth()
    {
        return (bool) $this->votes()
            ->where('user_id', auth()->user()->id)
            ->where('type', 1)
            ->first();
    }

    public function isDisLikedByAuth()
    {
        return (bool) $this->votes()
            ->where('user_id', auth()->user()->id)
            ->where('type',-1)
            ->first();
    }



}





