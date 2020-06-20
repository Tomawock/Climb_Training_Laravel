<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('titolo')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/@yield('stile')">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Training<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('mytraining.information') }}">Account</a></li>
                                <li><a href="{{ route('mytraining.programlist') }}">Personal Training Program</a></li>
                                <li><a href="{{ route('mytraining.historystatistic') }}">History and Statistics</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Training<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('exercise.index') }}">Exercise List</a></li>
                                <li><a href="{{ route('trainingprogram.index') }}">Training Program List</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if($logged)
                        <li><a><i>Welcome {{ $loggedName }}</i></a></li>
                        <li><a href="{{ route('user.logout') }}">logout <span class="glyphicon glyphicon-log-out"></span></a></li>
                        @else
                        <li><a href="{{ route('user.login') }}"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <ul class="breadcrumb pull-right">
                @yield('breadcrumb')
            </ul>
        </div>

        <div class="container">
            <header class="header-sezione">
                <h1>
                    @yield('titolo')
                </h1>
            </header>
        </div>
        @yield('corpo')
    </body>
</html>