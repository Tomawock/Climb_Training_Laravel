@extends('layout.master')

@section('titolo')
@if(isset($trainingprogram->id))
@lang('label.editTpTitle')
@else
@lang('label.editTpCreate')
@endif
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('trainingprogram.index') }}">@lang('label.trainingListNavbar')</a></li>
@if(isset($trainingprogram->id))
<li><a class="active">@lang('label.editTpTitle')</a></li>
@else
<li><a class="active">@lang('label.editTpCreate')</a></li>
@endif
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            @if(isset($trainingprogram->id))
            <form class="form-horizontal" enctype="multipart/form-data" name="trainingprogram" method="get" action="{{ route('trainingprogram.update', ['id' => $trainingprogram->id]) }}">
                @else
                <form class="form-horizontal" enctype="multipart/form-data" name="trainingprogram" method="post" action="{{ route('trainingprogram.store') }}">
                    @endif
                    {{csrf_field()}} 
                    <!-- Title of the Training Program-->
                    <div class="form-group">
                        <label for="trainingProgramTitle" class="col-md-2">@lang('label.trainingprogramTitle')</label>
                        <div class="col-md-10">
                            @if(isset($trainingprogram->id))
                            <input class="form-control" type="text" id="trainingProgramTitle" name="trainingProgramTitle" placeholder="@lang('label.trainingprogramTitle')" value="{{  $trainingprogram->title }}">
                            @else 
                            <input class="form-control" type="text" id="trainingProgramTitle" name="trainingProgramTitle" placeholder="@lang('label.trainingprogramTitle')">
                            @endif
                        </div>
                    </div>
                    <!-- Description-->
                    <div class="form-group">
                        <label for="trainingProgramDescription" class="col-md-2">@lang('label.editTpDescription')</label>
                        <div class="col-md-10">
                            @if(isset($trainingprogram->id))
                            <textarea class="form-control" rows="4" id="trainingProgramDescription" name="trainingProgramDescription">{{ $trainingprogram->description }}</textarea>
                            @else
                            <textarea class="form-control" rows="4" id="trainingProgramDescription" name="trainingProgramDescription" placeholder="@lang('label.editTpDescriptionPH')"></textarea>
                            @endif     
                        </div>
                    </div>
                    <!-- Time Averange fo the completment of the Training program -->
                    <div class="form-group">
                        <label for="trainingProgramTime" class="col-md-2">@lang('label.editTpTime')</label>
                        <label for="trainingProgramTimeMin" class="col-md-1">@lang('label.min')</label>
                        <div class="col-md-2">
                            @if(isset($trainingprogram->id))
                            <input type="time" id="trainingProgramTimeMin" name="trainingProgramTimeMin" class="form-control" min="00:00:00" max="24:59:59" value="{{ $trainingprogram->timeMin }}" required>
                            @else 
                            <input type="time" id="trainingProgramTimeMin" name="trainingProgramTimeMin" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                            @endif
                        </div>
                        <label for="trainingProgramTimeMax" class="col-md-1">@lang('label.max')</label>
                        <div class="col-md-2">
                            @if(isset($trainingprogram->id))
                            <input type="time" id="trainingProgramTimeMax" name="trainingProgramTimeMax" class="form-control" min="00:00:00" max="24:59:59" value="{{ $trainingprogram->timeMax }}" required>
                            @else
                            <input type="time" id="trainingProgramTimeMax" name="trainingProgramTimeMax" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                            @endif
                        </div>
                    </div>                       
                    <!-- lista di tutti gli esercizi disponibili con ceckbox associate-->
                    <!--tabella con ricerca-->
                    <div class="panel panel-default ">
                        <!-- Default panel contents -->
                        <div class="panel-heading text-center panel-relative">
                            <h2 class="panel-title">
                                <strong>@lang('label.exercises')</strong>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="@lang('label.search')">
                            </div>
                            <div class="col-md-1">
                                <span class="input-group-btn">   
                                    <button class="btn btn-link" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                            <div class="col-md-1">
                                <label for="orderTrainingProgramReps" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span> @lang('label.exerciseReps')</label>
                                <input id="orderTrainingProgramReps" type="submit" value='orderReps' class="hidden"/>      
                            </div>
                            <div class="col-md-1">
                                <label for="orderTrainingProgramSetss" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span> @lang('label.exerciseSets')</label>
                                <input id="orderTrainingProgramSets" type="submit" value='orderSets' class="hidden"/>      
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">@lang('label.editExerciseName')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseReps')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseSets')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseRest')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseOverweight')</th> 
                                        <th class="col-md-1 text-center">@lang('label.exerciseTools')</th>
                                        <th class="col-md-1 text-center">@lang('label.selected')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($trainingprogram->id))
                                    @foreach ($allExercises as $exercise)
                                    <tr>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->name}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->repsMin}} - {{$exercise->repsMax}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->setMin}}  - {{$exercise->setMax }}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->restMin}} - {{ $exercise->restMax}} </div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->overweightMin}} - {{$exercise->overweightMax}} {{$exercise->overweightUnit}}</div></td>     
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->myToolsToString()}}</div></td>
                                        @if ($trainingprogram->exercises->contains($exercise->id) == 1) 
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise{{$exercise->id}}" checked></div></td>
                                        @else
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise{{$exercise->id}}"></div></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach ($allExercises as $exercise) 
                                    <tr>                                           
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->name}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->repsMin}} - {{$exercise->repsMax}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->setMin}}  - {{$exercise->setMax }}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->restMin}} - {{ $exercise->restMax}} </div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->overweightMin}} - {{$exercise->overweightMax}} {{$exercise->overweightUnit}}</div></td>     
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->myToolsToString()}}</div></td>
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise{{$exercise->id}}"></div></td>  
                                    </tr>
                                    @endforeach
                                    @endif    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Buttons confirm-->
                    @if(isset($trainingprogram->id))
                    <input type="hidden" name="id" value="{{$trainingprogram->id}}"/>
                    <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> @lang('label.save')</label>
                    <input id="mySubmit" type="submit" value=\'Save\' class="hidden"/>
                    @else
                    <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> @lang('label.create')</label>
                    <input id="mySubmit" type="submit" value=\'Create\' class="hidden"/>
                    @endif                
                    <a href="{{ route('trainingprogram.index') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> @lang('label.cancel')</a>                         
                </form>
        </div>   
    </div>
</div>
@endsection