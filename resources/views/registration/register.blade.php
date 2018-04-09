@extends ('user.master')
@section('content')
    <div class="col-sm-11 col-sm-offset-2">
        <h2><i class="fa fa-user-plus"></i> Register: </h2>
        <hr>
        <form method="POST" action="{{ route('reg_user') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" id="name" />
                @foreach ($errors->get('name') as $message)
                    <label class="error-label">* {{ $message }}</label>
                @endforeach
            </div>
            <div class="form-group">
                <label for="gender">Gender: </label>
                <select name="gender" id="gender" class="form-control">
                    <option selected disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth: </label>
                <input type="date" class="form-control" name="dob" id="dob" />
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" />
                @foreach ($errors->get('email') as $message)
                    <label class="error-label">* {{ $message }}</label>
                @endforeach
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password: </label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Retype Password" />
                @foreach ($errors->get('password') as $message)
                    <label class="error-label">* {{ $message }}</label>
                @endforeach
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Register" />
            </div>
        </form>
        @include('blog.errors')
    </div>
@endsection