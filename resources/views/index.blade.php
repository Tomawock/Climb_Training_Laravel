@extends('layout.home')

@section('titolo')
@lang('label.homePageTitle')
@endsection

@section('stile', 'style.css')

@section('left_navbar')
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
@endsection

@section('right_navbar')
@auth
<li><a><i>@lang('label.welcome') {{ Auth::user()->name }}</i></a></li>
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
@endsection
