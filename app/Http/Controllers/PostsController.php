<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['index' , 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('index_post')->with('posts', $posts);
    }

    public function create()
    {
        return view('create_post');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //Post::create([
        //  'title' => $request->get('title'),
        //  'body' => $request->get('body'),
        //  'user_id' => auth()->user()->id
        //]);
        //Or we can do it like this
        auth()->user()->publish(
            new Post($request->only(['title', 'body']))
        );

        return redirect('/');
    }

    public function show(Post $post)
    {
        return view('show_post')->with('post', $post);
    }
}
