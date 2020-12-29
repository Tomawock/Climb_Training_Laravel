@extends('layouts.master')

@section('titolo')
@lang('label.destroyUserTitle')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
<li><a class="active">@lang('label.deleteUser')</a></li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {!! trans('label.destroyUserHeader', [ 'name' => $user->name ]) !!}
                </h1>
            </header>
            <p class='lead'>
                @lang('label.destroyUserConfirm')
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
                    <p>@lang('label.destroyUserRevertMessage')</p>
                    <p><a class="btn btn-default" href="{{ route('home') }}"><span class='glyphicon glyphicon-log-out'></span> @lang('label.backtohome')</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    @lang('label.confirm')
                </div>
                <div class='panel-body'>
                    <p>@lang('label.destroyUserConfirmMessage')</p>
                    <p><a class="btn btn-danger" href="{{ route('administrator.deluserconfirm', ['id' => $user->id]) }}"><span class='glyphicon glyphicon-trash'></span> @lang('label.delete')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection