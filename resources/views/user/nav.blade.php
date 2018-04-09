<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="container">
                <h3><a class="navbar-brand font-bold pull-left" href="#">Users Management System</a></h3>
                <ul class="nav navbar-nav">
                    <li><a href="/users"><i class="fa fa-home sekus"></i> Home</a></li>
                    <li><a href="/users">All Users</a></li>
                    <li><a href="/users/create">Create user</a></li>
                </ul>
                @if (Auth::check())
                    <div class="login-signup-box">
                        <h4 class="sekus pull-left"><a href="#"><b>{{ Auth::user()->name }}</b></a> | </h4>&nbsp;
                        <h4 class="sekus pull-right"><a href="{{ route('logout') }}"><b>Logout</b></a></h4>
                    </div>
                @else
                    <div class="login-signup-box">
                        <h4 class="sekus pull-left"><a href="{{ route('login') }}"><b>Sign In |</b></a></h4>&nbsp;
                        <h4 class="sekus pull-right"><a href="{{ route('register') }}"><b> Sign Up</b></a></h4>
                    </div>
                @endif
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>