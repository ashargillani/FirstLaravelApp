@extends('blog.master')
@section('content')
    @foreach($posts as $post)
        @include('blog.post')
    @endforeach
@endsection