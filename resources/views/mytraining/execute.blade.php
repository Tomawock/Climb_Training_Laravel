@extends('layout.master')

@section('titolo', 'Execute Training Program')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('mytraining.programlist') }}">Personal Training Program</a></li>
<li><a class="active">Execute</a></li>      
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <form class="form-horizontal" name="trainingProgram" method="post" action="{{ route('mytraining.postexecute',['id' => $trainingprogram->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="executionDate" class="col-md-2">Date of execution</label>
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
                            <strong>Exercises</strong>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">Name</th>
                                        <th class="col-md-2 text-center">Reps</th>
                                        <th class="col-md-2 text-center">Sets</th>
                                        <th class="col-md-2 text-center">Rest</th>
                                        <th class="col-md-1 text-center">Overweight</th>
                                        <th class="col-md-1 text-center">Tools</th>
                                        <th class="col-md-1 text-center">Reps Done</th>
                                        <th class="col-md-1 text-center">Sets Done</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($trainingprogram->exercises as $exercise)
                                    <tr>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->name}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->repsMin}} - {{$exercise->repsMax}}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->setMin}}  - {{$exercise->setMax }}</div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->restMin}} - {{ $exercise->restMax}} </div></td>
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->overweightMin}} - {{$exercise->overweightMax}} {{$exercise->overweightUnit}}</div></td>     
                                        <td><div style="height:50px; overflow:hidden">{{$exercise->myToolsToString()}}</div></td>                                    
                                        <td>
                                            <div style="height:50px; overflow:hidden">
                                                <select class="form-control" id="executedReps{{$exercise->id}}" name="executedReps{{$exercise->id}}">
                                                    @for ($i = 0; $i <= 50; $i++) 
                                                    <option>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="height:50px; overflow:hidden">
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
                                            <textarea class="form-control" rows="1" id="executedNotes{{$exercise->id}}" name="executedNotes{{$exercise->id}}" placeholder="Notes regardings exercise: {{$exercise->name}}"></textarea>
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
                <label for = "mySubmit" class = "btn btn-primary btn-large btn-block"><span class = "glyphicon glyphicon-floppy-save"></span> Save</label>
                <input id = "mySubmit" type = "submit" value = \'Save\' class="hidden"/>

                <!-- Buttons cancel-->
                <a href="{{ route('mytraining.programlist') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> Cancel</a>   

            </form>
        </div>   
    </div>
</div>
@endsection