@extends ('user.master')
@section('content')
    <div class="col-sm-11 col-sm-offset-2">
        <h2><i class="fa fa-sign-in"></i> Login: </h2>
        <hr>
        <form method="POST" action="{{ route('loginSession') }}">
            {{ csrf_field() }}
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
                @foreach ($errors->get('password') as $message)
                    <label class="error-label">* {{ $message }}</label>
                @endforeach
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Login" />
            </div>
        </form>
        @include('blog.errors')
    </div>
@endsection