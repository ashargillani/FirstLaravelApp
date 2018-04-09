<?php

namespace App;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // post -> user -> name
    {
        return$this->belongsTo(User::class);
    }

    /**
     * @param $body
     */
    public function addComment($body)
    {
        $this->comments()->create(['body' => $body]);
//        Comment::create([
//            'body' => request('body'),
//            'post_id' => $this->id
//        ]);
    }
}
