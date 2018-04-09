@extends('user.master')
@section('title')
    Add User
@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 blog-main">
        <h2>Create a User <i class="fa fa-user"></i></h2>
        <hr />
        <form method="post" action="/users">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Users Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User's Name" required>
            </div>
            <div class="form-group">
                <label for="email">Users Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="User's Email Id" required/>
            </div>
            <div class="form-group">
                <label for="gender">Users Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option selected disabled>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
        @include('blog.errors')
    </div>
@endsection