@extends('layouts.app')

@section('content')
<div class="container">
     <div class="col-md-offset-2 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">@lang('label.login')</div>
                <div class="card-header">@lang('label.verifyEmail')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('label.verifyEmailAlertSuccess')
                        </div>
                    @endif

                    @lang('label.verifyEmailControlVerification')
                    @lang('label.verifyEmailNotRecived')
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link align-baseline">@lang('label.verifyEmailRequestAnotherBtn')</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
