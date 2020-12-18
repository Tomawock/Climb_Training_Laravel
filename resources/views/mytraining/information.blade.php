@extends('layouts.master')

@section('titolo')
@lang('label.accountNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a class="active">@lang('label.accountNavbar')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong>@lang('label.mytrainingInfoDetails')</strong></h2></div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoName')</label>
                            <label class="col-md-6">{{$user->name}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoEmail')</label>
                            <label class="col-md-6">{{$user->email}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection