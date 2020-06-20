@extends('layout.master')

@section('titolo', 'Show Training Program')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('trainingprogram.index') }}">Training Program List</a></li>
<li><a class="active">Show Training Program </a></li>
@endsection

@section('corpo')
<!-- General Information -->
<div class="container text-center">
    <div class="row">
        <div class="col-md-offset-4 col-md-4"> 
            <h3>
                <stong>
                    <span class="glyphicon glyphicon-time"></span> {{ $trainingprogram->timeMin }} - {{ $trainingprogram->timeMax }}
                </stong>
            </h3>
        </div>
        <div class="col-md-2"> 
            <h3>
                <label for="downloadPdfTrainingProgram" class="btn btn-success">
                    <span class="glyphicon glyphicon-download-alt"></span> Dowload PDF
                </label>
                <input id="downloadPdfTrainingProgram" type="submit" value='downloadPDF' class="hidden"/> 
            </h3>
        </div>
        <div class="col-md-2"> 
            <h3>
                <label for="downloadJsonTrainingProgram" class="btn btn-success">
                    <span class="glyphicon glyphicon-download-alt"></span> Dowload JSON
                </label>
                <input id="downloadJsonTrainingProgram" type="submit" value='downloadJson' class="hidden"/> 
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
                    <h4>{{$trainingprogram->description}}</h4>
                </div>
                <!-- Table -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center">Name</th>
                                    <th class="col-md-2 text-center">Reps</th>
                                    <th class="col-md-2 text-center">Sets</th>
                                    <th class="col-md-2 text-center">Rest</th>
                                    <th class="col-md-2 text-center">Overweight</th>
                                    <th class="col-md-2 text-center">Tools</th>         
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