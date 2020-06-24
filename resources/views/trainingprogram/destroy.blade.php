@extends('layout.master')

@section('titolo')
@lang('label.destroyTpTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('trainingprogram.index') }}">@lang('label.trainingListNavbar')</a></li>
<li><a class="active">@lang('label.destroyTpTitle')</a></li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {!! trans('label.destroyTpHeader', [ 'title' => $trainingprogram->title ]) !!}
                </h1>
            </header>
            <p class='lead'>
                @lang('label.destroyTpConfirm')
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
                    <p>@lang('label.destroyTpRevertMessage')</p>
                    <p><a class="btn btn-default" href="{{ route('trainingprogram.index') }}"><span class='glyphicon glyphicon-log-out'></span> @lang('label.destroyTpBackMessage')</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    @lang('label.confirm')
                </div>
                <div class='panel-body'>
                    <p>@lang('label.destroyTpConfirmMessage')</p>
                    <p><a class="btn btn-danger" href="{{ route('trainingprogram.destroy', ['id' => $trainingprogram->id]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection