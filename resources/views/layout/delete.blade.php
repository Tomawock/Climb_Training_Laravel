@extends('layout.home')

@section('titolo_home')
@yield('titolo')
@endsection

@section('stile', 'style.css')

@section('inner_body')
<div class="container">
    <ul class="breadcrumb pull-right">
        @yield('breadcrumb')
    </ul>
</div>

<div class="container">
    <div class="panel panel-default ">
    @yield('corpo')
    </div>
</div>
@endsection