@extends('layouts.master')

@section('titolo')
@lang('label.trainingListNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('trainingprogram.index') }}">@lang('label.trainingListNavbar')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-offset-10 col-md-2">
            <a class="btn btn-success btn-block" href="{{ route('trainingprogram.create') }}"><span class="glyphicon glyphicon-new-window"></span> @lang('label.editTpCreate')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-3">@lang('label.trainingprogramTitle')</th>
                            <th class="col-md-5">@lang('label.editTpDescription')</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Allenamenti degli Admin-->
                        @foreach($trainingprogram as $tp)
                        <tr>
                            <td>{{ $tp->title}}</td>
                            <td>{{ $tp->description}}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('trainingprogram.show', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('trainingprogram.copy', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-plus"></span> @lang('label.copy')</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Allenamenti dell'utente ovvero quelli cancellabili-->
                        @foreach($usertrainingprogram as $tp)
                        <tr>
                            <td>{{ $tp->title}}</td>
                            <td>{{ $tp->description}}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('trainingprogram.show', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('trainingprogram.edit', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-pencil"></span> @lang('label.edit')</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('trainingprogram.destroy.confirm', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-trash"></span> @lang('label.delete')</a>
                            </td>
                            @endif
                            <td></td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection