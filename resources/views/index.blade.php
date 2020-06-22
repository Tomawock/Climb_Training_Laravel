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
@if($logged)
<li><a><i>@lang('label.welcome') {{ $loggedName }}</i></a></li>
<li><a href="{{ route('user.logout') }}">@lang('label.logout') <span class="glyphicon glyphicon-log-out"></span></a></li>
@else
<li><a href="{{ route('user.login') }}"><span class="glyphicon glyphicon-user"></span> @lang('label.login')</a></li>
@endif
@endsection
