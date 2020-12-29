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
        <div class='col-md-offset-3 col-md-6 col-md-offset-3'>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1>@lang('label.funtionalities')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h2>@lang('label.exercise')</h2>
                </div>
                <div class="panel-body">
                    <ul>
                        <h4><li>@lang('label.exerciseFunctionality1')</li></h4>
                        <h4><li>@lang('label.exerciseFunctionality2')</li></h4>
                        <h4><li>@lang('label.exerciseFunctionality3')</li></h4>
                        <h4><li>@lang('label.exerciseFunctionality4')</li></h4>
                        <h4><li>@lang('label.exerciseFunctionality5')</li></h4>
                    </ul> 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h2>@lang('label.trainingProgram')</h2>
                </div>
                <div class="panel-body">
                    <ul>
                        <h4><li>@lang('label.trainingProgramFunctionality1')</li></h4>
                        <h4><li>@lang('label.trainingProgramFunctionality2')</li></h4>
                        <h4><li>@lang('label.trainingProgramFunctionality3')</li></h4>
                        <h4><li>@lang('label.trainingProgramFunctionality4')</li></h4>
                        <h4><li>@lang('label.trainingProgramFunctionality5')</li></h4>
                        <h4><li>@lang('label.trainingProgramFunctionality6')</li></h4>
                    </ul> 
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12" >
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h2>@lang('label.historyInfo')</h2>
                </div>
                <div class="panel-body">
                    <ul>
                        <h4><li>@lang('label.historyInfoFunctionality1')</li></h4>
                        <h4><li>@lang('label.historyInfoFunctionality2')</li></h4>
                        <h4><li>@lang('label.historyInfoFunctionality3')</li></h4>
                        
                    </ul> 
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class='col-md-offset-3 col-md-6 col-md-offset-3'>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1>@lang('label.adminsSuggestion')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class='lead'>
                        @lang('label.adminsSuggestionExplained')
                    </p>       
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" >
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h2>@lang('label.adminsFunctionalityName')</h2>
                </div>
                <div class="panel-body">
                    <ul>
                        <h4><li>@lang('label.adminsFunctionality1')</li></h4>
                        <h4><li>@lang('label.adminsFunctionality2')</li></h4>
                        <h4><li>@lang('label.adminsFunctionality3')</li></h4>
                        <h4><li>@lang('label.adminsFunctionality4')</li></h4>
                        <h4><li>@lang('label.adminsFunctionality5')</li></h4>                  
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
