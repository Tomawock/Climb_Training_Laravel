@extends('layouts.master')

@section('titolo')
@lang('label.showTpTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('trainingprogram.index') }}">@lang('label.trainingListNavbar')</a></li>
<li><a class="active">@lang('label.showTpTitle')</a></li>
@endsection

@section('corpo')
<!-- General Information -->
<div class="container text-center">
    <div class="row">
        <div class="col-md-12"> 
            <h2>
                <stong id="title">
                    {{ $trainingprogram->title }}
                </stong>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4"> 
            <h3>
                <span class="glyphicon glyphicon-time"></span> 
                <stong id="time">{{ $trainingprogram->timeMin }} - {{ $trainingprogram->timeMax }} </stong>
            </h3>
        </div>
        <div class="col-md-offset-2 col-md-2"> 
            <h3>
                <label for="downloadPdfTrainingProgram" class="btn btn-success" onclick="download()">
                    <span class="glyphicon glyphicon-download-alt"></span> @lang('label.showTpDownloadPDF')
                </label>
            </h3>
        </div>
    </div>
</div>
<!-- Training Program Details  -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-body text-center panel-relative">
                    <h4 id="description">{{$trainingprogram->description}}</h4>
                </div>
                <!-- Table -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed text-center" id="toDowload">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center">@lang('label.editExerciseName')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseReps')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseSets')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseRest')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseOverweight')</th> 
                                    <th class="col-md-2 text-center">@lang('label.exerciseTools')</th>     
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($trainingprogram->exercises as $exercise)
                                <tr>
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->name}}</div></td>
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->repsMin}} - {{$exercise->repsMax}}</div></td>
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->setMin}}  - {{$exercise->setMax }}</div></td>
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->restMin}} - {{ $exercise->restMax}} </div></td>
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->overweightMin}} - {{$exercise->overweightMax}} {{$exercise->overweightUnit}}</div></td>     
                                    <td><div style="height:auto; overflow:hidden">{{$exercise->myToolsToString()}}</div></td>
                                </tr>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection