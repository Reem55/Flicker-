<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body', 
        'user_id',
     ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // bad-practice
    // you did not even use it
    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }

    // bad-practice, better to named 'publisher' or 'auther'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCreatedBy(User $user)
    {
        return $this->user_id == $user->id;
    }

    // bad-practice, should be "votes" and this aint the scope shape!!
    public function scopeGetAll($q)
    {
        return $this->hasMany(Vote::class);
    }

    public function getAuthIsVote()
    {        
        return $this->votes()->where('user_id', auth()->user()->id)->first();
    }
    
    public function isLikedByAuth()
    {
        // better to user the shortcut than write (bool)
        return !! $this->votes()
            ->where('user_id', auth()->user()->id)
            ->where('type', 1)
            ->first();
    }

    public function isDisLikedByAuth()
    {
        // better to user the shortcut than write (bool)
        return !! $this->votes()
            ->where('user_id', auth()->user()->id)
            ->where('type', -1)
            ->first();
    }
}





