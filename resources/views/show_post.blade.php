@extends('blog.master')
@section('content')
    @include('blog.post', ['post' => $post])
    <hr>
    <h3>Comments: </h3>
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <p>{{ $comment->body }}</p>
                    <label class="comment-time">{{ $comment->created_at->diffForHumans() }}</label>
                </li>
            @endforeach
        </ul>
        {{-- Add a comment --}}
        <div class="card">
            <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Put your comment here"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="submit" id="post-comment" class="btn btn-primary">Post Comment</button>
                    </div>
                    @include('blog.errors')
                </form>
            </div>
        </div>
    </div>
@endsection