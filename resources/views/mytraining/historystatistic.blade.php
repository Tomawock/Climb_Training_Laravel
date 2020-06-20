@extends('layout.master')

@section('titolo', 'History and Statistics')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>         
<li><a class="active">History and Statistics</a></li>  
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        @for($i=0;$i< count($result['title']);$i++) 
        <div class="panel panel-default ">
            <div class="panel-heading text-center panel-relative">
                <h2 class="panel-title">
                    <strong> Training: {{$result['title'][$i]}} executed on Date: {{ date("d/m/Y", strtotime($result['date'][$i])) }}</strong>
                </h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover text-center">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Name</th>
                                <th class="col-md-2 text-center">Reps Suggested</th>
                                <th class="col-md-2 text-center">Sets Suggested</th>
                                <th class="col-md-2 text-center">Reps Executed</th>
                                <th class="col-md-2 text-center">Sets executed</th>
                                <th class="col-md-2 text-center">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($j=0;$j< count($result['exercises'][$i]['exercise']);$j++)
                            <tr>     
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->name}}</div></td>
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->repsMin}} - {{$result['exercises'][$i]['exercise'][$j]->repsMax}}</div></td>
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->setMin}} - {{$result['exercises'][$i]['exercise'][$j]->setMax}}</div></td>
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->reps}}</div></td>
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->sets}}</div></td>
                                <td><div style="height:50px; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->note}}</div></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection