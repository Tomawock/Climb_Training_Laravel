@extends('layout.home')

@section('titolo', 'Home page')

@section('stile', 'style.css')

@section('left_navbar')
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
@endsection

@section('right_navbar')
@if($logged)
<li><a><i>Welcome {{ $loggedName }}</i></a></li>
<li><a href="{{ route('user.logout') }}">logout <span class="glyphicon glyphicon-log-out"></span></a></li>
@else
<li><a href="{{ route('user.login') }}"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
@endif
@endsection
