@extends('user.master')
@section('title')
    Show User
@endsection
@section('content')
    <h1 class="text-center sekus">{{ $user->name }}</h1>
    <hr>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="well">
            <div class="thumbnail" onclick="location.href='/users/{{ $user->id }}'">
                <img src="{{ $user->gender == 'Male' ? asset('images/boy.jpg'): asset('images/girl.jpg') }}" alt="UserPic"/>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-horizontal m-10p">
            <div class="form-group">
                <h3><i class="fa fa-info-circle"></i> User's complete information :</h3>
                <br>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Name: </label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{ $user->name }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email: </label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{ $user->email }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Gender: </label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{ $user->gender }}</p>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="location.href='/users/{{ $user->id }}/edit'">Edit <i class="fa fa-pencil"></i></button>&nbsp;&nbsp;
                <button class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete <i class="fa fa-remove"></i></button>
            </div>
        </div>
    </div>
    <div class="form-div">
        <form method="POST" id="delete-user-form">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection