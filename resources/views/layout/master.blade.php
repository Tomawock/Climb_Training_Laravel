<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('titolo')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        
         <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/@yield('stile')">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/js/myScript.js"></script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.5.6/dist/jspdf.plugin.autotable.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        
        <script type="text/javascript" class="init">
            var options = {
                    "info":     false,
                    "lengthChange": false,
                    "pageLength": 10
                };               
            $(document).ready(function () {
                $('#searchandorder').DataTable(options);
            });

        </script>
        
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
                        <li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('label.myTrainingNavbar')<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
                                <li><a href="{{ route('mytraining.programlist') }}">@lang('label.personalTrainingNavbar')</a></li>
                                <li><a href="{{ route('mytraining.historystatistic') }}">@lang('label.historyStatisticNavbar')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('label.trainingNavbar')<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('exercise.index') }}">@lang('label.exerciseListNavbar')</a></li>
                                <li><a href="{{ route('trainingprogram.index') }}">@lang('label.trainingListNavbar')</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if($logged)
                        <li><a><i>@lang('label.welcome') {{ $loggedName }}</i></a></li>
                        <li><a href="{{ route('user.logout') }}">@lang('label.logout') <span class="glyphicon glyphicon-log-out"></span></a></li>
                        @else
                        <li><a href="{{ route('user.login') }}"><span class="glyphicon glyphicon-user"></span> @lang('label.login')</a></li>
                        @endif
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