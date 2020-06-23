@extends('layout.master')

@section('titolo')
@lang('label.destroyExerciseTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('exercise.index') }}">@lang('label.exerciseListNavbar')</a></li>
<li><a class="active">@lang('label.destroyExerciseTitle')</a></li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {!! trans('label.destroyExerciseHeader', [ 'name' => $exercise->name ]) !!}
                </h1>
            </header>
            <p class='lead'>
                @lang('label.destroyExerciseConfirm')
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    @lang('label.revert')
                </div>
                <div class='panel-body'>
                    <p>@lang('label.destroyExerciseRevertMessage')</p>
                    <p><a class="btn btn-default" href="{{ route('exercise.index') }}"><span class='glyphicon glyphicon-log-out'></span> @lang('label.destroyExerciseBackMessage')</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    @lang('label.confirm')
                </div>
                <div class='panel-body'>
                    <p>@lang('label.destroyExerciseConfirmMessage')</p>
                    <p><a class="btn btn-danger" href="{{ route('exercise.destroy', ['id' => $exercise->id]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection