@extends('blog.master')
@section('content')
    <div class="col-md-8 blog-main">
        <h2>Create a Post</h2>
        <hr />
        <form method="post" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Post Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Post Title" >
            </div>
            <div class="form-group">
                <label for="body">Post Body:</label>
                <textarea class="form-control" id="body" name="body" placeholder="Post Body" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
        @include('blog.errors')
    </div>
@endsection