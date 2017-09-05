{{-- logined user  --}}

@if( Auth::check() )
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="/img/logo.png" alt="logo.png" class="img-responsive" style="height: 40px">
                    Laravel Blog
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.list') }}">Manage Posts</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}">Create Post</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.list') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}">Tags</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">
                                {{ Auth::user()->name }}<i class="fa fa-angle-double-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                                <form method="POST" action="{{ route('logout') }}">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" class="navbar_logout_button" value="logout">
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

@else
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="/img/logo.png" alt="logo.png" class="img-responsive" style="height: 40px">
                    Laravel Blog
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/contact">Contact</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">
                                USER <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="/login">Login</a>
                                <a href="/register">Register</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
@endif

