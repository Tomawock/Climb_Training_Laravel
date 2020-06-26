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

            $(document).ready(function () {
                $('#searchandorder').DataTable();
            });

        </script>
    </head>
    
    <body class="bg-home-page">
        <nav class="navbar navbar-inverse navbar-fixed-top">
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
    </body>
</html>
