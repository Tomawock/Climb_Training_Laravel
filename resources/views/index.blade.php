@extends('layouts.home')

@section('titolo_home')
@lang('label.homePageTitle')
@endsection

@section('stile', 'style.css')

@section('inner_body')
<div class="container">
    <div class="row">
        <div class='col-md-offset-3 col-md-6 col-md-offset-3'>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1>{{ config('app.name', 'CT') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class='lead'>
                        @lang('label.indexDescription')
                    </p>       
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h2>@lang('label.create') @lang('label.editExerciseTitleCreate')</h2>
                </div>
                <div class="panel-body">
                    <img src="" class="rounded">
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h2>@lang('label.create') @lang('label.editTpCreate')</h2>
                </div>
                <div class="panel-body">
                    <img src="" class="rounded">
                </div>
            </div>
        </div>     
    </div>
</div>
@endsection
