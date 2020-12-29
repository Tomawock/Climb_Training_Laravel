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
        @foreach($result as $traning)
        <div class="panel panel-default ">
            <div class="panel-heading text-center panel-relative">
                <h2 class="panel-title">
                    <?php
                    $json = $traning->json;
                    $date = $traning->date;
                    $exercises = json_decode($json);
                    $title = $exercises->traning_title;
                    $exercises = $exercises->exercises;
                    ?>
                    <strong>{!! trans('label.mytrainingHsPanelTitle', [ 'title' => $title, 'date' => date("d/m/Y", strtotime($date)) ]) !!}</strong>
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
                            @foreach($exercises as $exercise)
                            <tr>     
                                <td><div style="height:auto; overflow:hidden">{{$exercise->exercise_name}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$exercise->reps_min}} - {{$exercise->reps_max}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$exercise->set_min}} - {{$exercise->set_max}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$exercise->reps}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$exercise->sets}}</div></td>
                                <td><div style="height:auto; overflow:hidden">{{$exercise->note}}</div></td>
                            </tr>
                            @endforeach
                            <tr>     
                                <td><div></div></td>
                                <td><div></div></td>
                                <td><div></div></td>
                                <td><div></div></td>
                                <td><div></div></td>
                                <td>
                                    <div>
                                        <a class="btn btn-danger btn-block" href="{{ route('mytraining.destroy', ['id' => ($traning->id)]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

