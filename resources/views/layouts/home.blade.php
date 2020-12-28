<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('titolo_home')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!--metadata for ajax token-->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/@yield('stile')">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> <!-- Feedback -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/js/myScript.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!--  FOR DOWNLOAD PDF   -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.5.13/dist/jspdf.plugin.autotable.js"></script>
        <!--  FOR DataTable  -->
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
        
    </head>
    
    <body class="bg-home-page">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                @guest
                <div class="navbar-header">
                    <a class="navbar-brand disabled">
                        {{ config('app.name', 'CT') }}
                    </a>
                 </div>
                @endguest
                <div class="collapse navbar-collapse" id="myNavbar">
                    @auth
                    <!-- Left Navbar -->
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
                    @endauth
                    <!-- Right Navbar  -->
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                        <li><a class="disabled"><i>@lang('label.welcome') {{ Auth::user()->name }}</i></a></li>
                        <li>
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                @lang('label.logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> @lang('label.login')</a></li>
                        @endauth
                        <li><a href="{{ route('setLang', ['lang' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/en.png" width="30" class="img-rounded"/></a></li>
                        <li><a href="{{ route('setLang', ['lang' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/it.png" width="24" class="img-rounded"/></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('inner_body')
    </body>
</html>
