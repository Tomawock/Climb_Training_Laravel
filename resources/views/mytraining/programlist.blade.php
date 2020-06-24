@extends('layout.master')

@section('titolo')
@lang('label.personalTrainingNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a class="active">@lang('label.personalTrainingNavbar')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3">@lang('label.trainingprogramTitle')</th>
                            <th class="col-md-5">@lang('label.editExerciseDescription')</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th> 
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($user->trainingprograms as $tp) 
                        <tr>
                            <td>{{$tp->title}}</td>
                            <td>{{$tp->description}}</td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('mytraining.removemytraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-trash"></span> @lang('label.remove')</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('mytraining.executetraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-play"></span> @lang('label.execute')</a>
                            </td>
                        </tr>
                        @endforeach    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection