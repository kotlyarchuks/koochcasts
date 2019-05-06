 <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        @if (Route::has('login'))
                            @auth
                            <li><a href="/">Hi, {{auth()->user()->name}}</a></li>
                        @else
                            <li><a href="javascript:" data-toggle="modal" data-target="#loginModal">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->

    </header>
    <!--/header-->