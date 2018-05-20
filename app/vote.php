<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'type'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
