@extends('layout.master')

@section('titolo')
@lang('label.showExerciseTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('exercise.index') }}">@lang('label.exerciseListNavbar')</a></li>
<li><a class="active">@lang('label.showExerciseTitle')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong>@lang('label.showExerciseTableTitle')</strong></h2></div>
                <!-- Table -->
                <div class="col-md-12 col-xs-12">
                    <div  class="table-responsive">
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center">@lang('label.exerciseReps')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseSets')</th>
                                    <th class="col-md-2 text-center">@lang('label.exerciseRest')</th>                                       
                                    <th class="col-md-2 text-center">@lang('label.exerciseOverweight')</th>
                                    <th class="col-md-1 text-center">@lang('label.exerciseUnit')</th>
                                    <th class="col-md-3 text-center">@lang('label.exerciseTools')</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="success">
                                    <td>{{ $exercise->repsMin }} - {{ $exercise->repsMax}}</td>
                                    <td>{{ $exercise->setMin }} - {{ $exercise->setMax}}</td>
                                    <td>{{ $exercise->restMin }} - {{ $exercise->restMax}}</td>
                                    <td>{{ $exercise->overweightMin }} - {{ $exercise->overweightMax}}</td>
                                    <td>{{ $exercise->overweightUnit }}</td>
                                    <td>{{ $toolsString }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container">
    <div class="row">
        <!-- Description and important Notes -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class='panel-heading text-center panel-relative'>
                    <h2 class="panel-title"><strong>@lang('label.showExerciseDesciptionTitle')</strong></h2>
                </div>
                <div class='panel-body'>
                    <p><h3>{{$exercise->description}}<br></h3></p>
                    <div class="notice notice-warning">
                        <h4><strong>@lang('label.editExerciseImportantNotes')</strong></h4>
                        <p>
                        <h4>{{$exercise->importantNotes}}</h4>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide show delle immagino con i botoni -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class='panel-heading text-center panel-relative'>
                    <h2 class="panel-title"><strong>@lang('label.showExercisePhotoTitle')</strong></h2>
                </div>
                <div class='panel-body'>
                    @foreach ($exercise->photos as $ph) 
                    <img src="{{ asset($ph->path) }}" class="img-thumbnail img-responsive"><!-- necessiti di link vistuale per far vedere le immagini -->
                    <figcaption class="figure-caption text-center ">{{$ph->description}}</figcaption>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection