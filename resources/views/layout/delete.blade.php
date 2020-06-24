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
        <nav class="navbar-default">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        @yield('left_navbar')
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @yield('right_navbar')
                                                <li><a href="{{ route('setLang', ['lang' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/en.png" width="30" class="img-rounded"/></a></li>
                        <li><a href="{{ route('setLang', ['lang' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/it.png" width="24" class="img-rounded"/></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <ul class="breadcrumb pull-right">
                @yield('breadcrumb')
            </ul>
        </div>

        @yield('corpo')

    </body>
</html>