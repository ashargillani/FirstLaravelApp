<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'email', 'dob', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
//        Post::create([
//            'title' => request('title'),
//            'body' => request('body')
//        ]);
// Save/Create, both options are available but we used save here so because we provided an instance of Post
// For create we have to provide an array
        $this->posts()->save($post);
    }
}
