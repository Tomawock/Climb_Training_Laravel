@extends('layouts.master')

@section('titolo')
@lang('label.administratorPage')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
<li><a class="active">@lang('label.administratorPage')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-6">@lang('label.mytrainingInfoUsername')</th>
                            <th class="col-md-3">@lang('label.administrator')</th>
                            <th class="col-md-3">@lang('label.deleteUser')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users_list as $usr)
                        <tr>
                            <td>{{ $usr->name  }}</td>
                            <td>
                                <div class="switch">
                                    @if ($usr->is_admin)
                                    <input id="cmn-toggle-{{$usr->id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked="checked">
                                    @else
                                    <input id="cmn-toggle-{{$usr->id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                                    @endif
                                    <label for="cmn-toggle-{{$usr->id}}"></label>
                                </div>
                            </td>
                            <td>
                                @if ($usr->is_admin)
                                <a class="btn btn-warning btn-block disabled" href="{{ route('exercise.copy', ['id' => 1]) }}"> @lang('label.administrator')</a>
                                @else
                                <a class="btn btn-danger btn-block" href="{{ route('administrator.deluser', ['id' => $usr->id]) }}"> @lang('label.deleteUser')</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 
