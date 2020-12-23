@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('label.confirmPassword')</div>


            <div class="panel-body">
                @lang('label.confirmPasswordSuggestion')

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-right">@lang('label.password')</label>

                        <div class="col-md-6 ">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                @lang('label.confirmPassword')
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">@lang('label.forgotPassword')</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
