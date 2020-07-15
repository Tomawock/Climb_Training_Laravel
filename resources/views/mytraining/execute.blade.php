@extends('layout.master')

@section('titolo')
@lang('label.mytrainingExecuteTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.programlist') }}">@lang('label.personalTrainingNavbar')</a></li>
<li><a class="active">@lang('label.execute')</a></li>      
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <form class="form-horizontal" name="trainingProgram" method="post" action="{{ route('mytraining.postexecute',['id' => $trainingprogram->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="executionDate" class="col-md-2">@lang('label.mytrainingExecuteDate')</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="executionDate" name="executionDate" value="{{date("d/m/Y")}}">
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
                        <div class="table-responsive">
                            <table class="table table-responsive table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">@lang('label.editExerciseName')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseReps')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseSets')</th>
                                        <th class="col-md-2 text-center">@lang('label.exerciseRest')</th>
                                        <th class="col-md-1 text-center">@lang('label.exerciseOverweight')</th>
                                        <th class="col-md-1 text-center">@lang('label.exerciseTools')</th>
                                        <th class="col-md-1 text-center">@lang('label.exerciseRepsDone')</th>
                                        <th class="col-md-1 text-center">@lang('label.exerciseSetsDone')</th>
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
                                        <td>
                                            <div style="height:auto; overflow:hidden">
                                                <select class="form-control" id="executedReps{{$exercise->id}}" name="executedReps{{$exercise->id}}">
                                                    @for ($i = 0; $i <= 50; $i++) 
                                                    <option>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="height:auto; overflow:hidden">
                                                <select class="form-control" id="executedSets{{$exercise->id}}" name="executedSets{{$exercise->id}}">
                                                    @for ($i = 0; $i <= 50; $i++) 
                                                    <option>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="9">
                                            <textarea class="form-control" rows="1" id="executedNotes{{$exercise->id}}" name="executedNotes{{$exercise->id}}" placeholder="{!! trans('label.mytrainingExecuteNote', [ 'name' => $exercise->name ]) !!}"></textarea>
                                        </td>

                                    </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Buttons confirm-->
                <input type = "hidden" name = "id" value = "{{$trainingprogram->id}}"/>
                <label for = "mySubmit" class = "btn btn-primary btn-large btn-block"><span class = "glyphicon glyphicon-floppy-save"></span> @lang('label.save')</label>
                <input id = "mySubmit" type = "submit" value = \'Save\' class="hidden"/>
                <!-- Buttons cancel-->
                <br>
                <a href="{{ route('mytraining.programlist') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> @lang('label.cancel')</a>   
            </form>
        </div>   
    </div>
</div>
@endsection