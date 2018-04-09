@extends('user.master')
@section('title')
    Update User
@endsection
@section('content')
    @if($user->id == Auth::id())
    <div class="col-md-9 col-sm-offset-3 blog-main">
        <h2>Edit User <i class="fa fa-user"></i> :</h2>
        <hr />
        <form method="post" action="/users/{{ $user->id }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">Users Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User's Name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Users Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="User's Email Id" required value="{{ $user->email }}"/>
            </div>
            <div class="form-group">
                <label for="gender" value="{{ $user->gender }}">Users Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option selected disabled>Select Gender</option>
                    <option {{ $user->gender == 'Male' ? "selected" : "" }}>Male</option>
                    <option {{ $user->gender == 'Female' ? "selected" : "" }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        @include('blog.errors')
    </div>
    @else
    {{
        redirect('home')->withErrors([
            'message' => 'Dear User you can only edit your own profile :D'
        ])
    }}
    @endif
@endsection