@extends('layouts.master')

@section('titolo')
@lang('label.destroyHistoryTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.historystatistic') }}">@lang('label.historyStatisticNavbar')</a></li>
<li><a class="active">@lang('label.destroyHistoryTitle')</a></li>
@endsection

@section('corpo')
<?php
$json = $history->json;
$date = $history->date;
$exercises = json_decode($json);
$title = $exercises->traning_title;
$exercises = $exercises->exercises;
?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {!! trans('label.destroyHistoryHeader', [ 'name' => $title ]) !!}
                </h1>
            </header>
            <p class='lead'>
                @lang('label.destroyHistoryConfirm')
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
                    <p>@lang('label.destroyHistoryRevertMessage')</p>
                    <p><a class="btn btn-default" href="{{ route('mytraining.historystatistic') }}"><span class='glyphicon glyphicon-log-out'></span> @lang('label.destroyHistoryBackMessage')</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    @lang('label.confirm')
                </div>
                <div class='panel-body'>
                    <p>@lang('label.destroyHistoryConfirmMessage')</p>
                    <p><a class="btn btn-danger" href="{{ route('mytraining.destroyconfirm', ['id' => $history->id]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection