@extends('layout.master')

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
    <div class="row">
        <div class="col-md-offset-2">
            <h1>@lang('label.historyStatisticErrorTitle')</h1>
        </div>
    </div>
</div>
@endsection