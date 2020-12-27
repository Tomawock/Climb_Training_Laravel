@extends('layouts.master')

@section('titolo')
@lang('label.destroyExerciseTitleAdmin')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
<li><a href="{{ route('administrator.delexercise') }}">@lang('label.administrExerc')</a></li>
<li><a class="active">@lang('label.destroyExerciseTitleAdmin')</a></li>
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
                    <p><a class="btn btn-default" href="{{ route('administrator.delexercise') }}"><span class='glyphicon glyphicon-log-out'></span> @lang('label.destroyExerciseBackMessage')</a></p>
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
                    <p><a class="btn btn-danger" href="{{ route('administrator.destroy', ['id' => $exercise->id]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection