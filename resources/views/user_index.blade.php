@extends('user.master')
@section('title')
    All Users
@endsection
@section('content')
    @if(Session::has('message'))
        <p class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @elseif($errors)
        @foreach($errors->all() as $error)
            <h3 class="text-center"><label class="label label-danger"><i class="fa fa-warning"></i> {{ $error }}</label></h3>
        @endforeach
    @endif
    <br>
    <h3 class="text-center">Registered Users</h3>
    <br>
    @php ($var = 1)
    @php ($jump = 5)
    <div class="row">
        @foreach($users as $user)
            <div class="col-sm-3 col-xs-12">
                <div class="well">
                    @if($user->id == Auth::id())
                    <div class="edit-btn" onclick="location.href='/users/{{ $user->id }}/edit'">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <div class="delete-btn" data-userinfo="{{ $user->id }}">
                        <i class="fa fa-remove"></i>
                    </div>
                    @endif
                    <div class="thumbnail" onclick="location.href='/users/{{ $user->id }}'">
                        <img src="{{ $user->gender == 'Male' ? asset('images/boy.jpg'): asset('images/girl.jpg') }}" alt="UserPic"/>
                    </div>
                    <div class="caption" >
                        <p><a href="/users/{{ $user->id }}" class="sekus"><b>{{ $user->name }}</b><br /></a></p>
                    </div>
                </div>
            </div>
            @if($var % $jump == 0 )
                @php($jump+=5);
                </div>
                <div class="row">
            @endif
            @php($var++)
        @endforeach
    </div>
    <div class="form-div">
        <form method="POST" id="delete-user-form">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="js/custom.js"></script>
@endsection