@extends('layouts.master')

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
    <script>feedbackPositive("{{Session::has('success')}}", "{{Session::get('success')}}");</script>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                    <th class="col-md-3">
                        <input id="filter-title" class="form-control" type="text" placeholder="@lang('label.searchByTitle')" value="" data-column="0"/>
                    </th>
                    <th class="col-md-7">
                        <input id="filter-description" class="form-control" type="text" placeholder="@lang('label.searchByDescription')" value="" data-column="1" />
                    </th>
                    <th class="col-md-2"></th>
                    <tr>
                        <th class="col-md-3">@lang('label.trainingprogramTitle')</th>
                        <th class="col-md-7">@lang('label.editExerciseDescription')</th>
                        <th class="col-md-2"></th> 
                    </tr>
                    </thead>
                    <tbody>               
                        @foreach ($user->trainingprograms as $tp) 
                        <tr>
                            <td>{{$tp->title}}</td>
                            <td>{{$tp->description}}</td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('mytraining.executetraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-play"></span> @lang('label.execute')</a>
                            </td>
                        </tr>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection