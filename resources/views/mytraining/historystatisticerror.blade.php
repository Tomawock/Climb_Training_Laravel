@extends('layouts.master')

@section('titolo')
@lang('label.historyStatisticNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>         
<li><a class="active">@lang('label.historyStatisticNavbar')</a></li>  
@endsection

@section('corpo')
<div class="container">
    <div class="row errorehistory">       
        <h1 style="text-align: center;">@lang('label.historyStatisticErrorTitle')</h1>
    </div>
</div>
@endsection