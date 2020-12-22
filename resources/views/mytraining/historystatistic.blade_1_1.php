@extends('layouts.master')

@section('titolo')
@lang('label.historyStatisticNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>         
<li><a class="active">@lang('label.historyStatisticNavbar')</a></li>  
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        @for($i=0;$i< count($result['title']);$i++) 
        <div class="panel panel-default ">
            <div class="panel-heading text-center panel-relative">
                <h2 class="panel-title">
                    <strong>{!! trans('label.mytrainingHsPanelTitle', [ 'title' => $result['title'][$i], 'date' => date("d/m/Y", strtotime($result['date'][$i])) ]) !!}</strong>
                </h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover text-center">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">@lang('label.editExerciseName')</th>
                                <th class="col-md-2 text-center">@lang('label.exerciseRepsSuggested')</th>
                                <th class="col-md-2 text-center">@lang('label.exerciseSetsSuggested')</th>
                                <th class="col-md-2 text-center">@lang('label.exerciseRepsExecuted')</th>
                                <th class="col-md-2 text-center">@lang('label.exerciseSetsExecuted')</th>
                                <th class="col-md-2 text-center">@lang('label.exerciseNotes')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($j=0;$j< count($result['exercises'][$i]['exercise']);$j++)
                            <tr>     
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->name}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->reps_min}} - {{$result['exercises'][$i]['exercise'][$j]->repsMax}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['exercise'][$j]->set_min}} - {{$result['exercises'][$i]['exercise'][$j]->setMax}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->reps}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->sets}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$result['exercises'][$i]['execution'][$j]->note}}</div></td>
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