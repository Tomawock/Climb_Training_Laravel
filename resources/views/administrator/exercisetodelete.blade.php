@extends('layouts.master')

@section('titolo')
@lang('label.administrExerc')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
<li><a class="active">@lang('label.administrExerc')</a></li>
@endsection

@section('corpo')
<div class="container">
    <script>feedbackPositive("{{Session::has('success')}}", "{{Session::get('success')}}");</script>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive"><!-- da metter prima del tag table o ppoteri avere errori-->
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-1">
                            </th>
                            <th class="col-md-3">
                                <input id="filter-title" class="form-control" type="text" placeholder="@lang('label.searchByTitle')" value="" data-column="1"/>
                            </th>
                            <th class="col-md-5">
                                <input id="filter-description" class="form-control" type="text" placeholder="@lang('label.searchByDescription')" value="" data-column="2"/>
                            </th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                        <tr>
                            <th class="col-md-1">@lang('label.owner')</th>
                            <th class="col-md-3">@lang('label.editExerciseName')</</th>
                            <th class="col-md-5">@lang('label.editExerciseDescription')</</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exercises as $exercise)
                        <tr>
                            <td>@lang('label.administrator')</td>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('exercise.show', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <!-- Cancellare e sostituire con copia e modifica su soli gli esercizi dell'utente--> 
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-pencil"></span> @lang('label.edit')</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('administrator.destroy.confirm', ['id' => $exercise->id]) }}"><span class="glyphicon glyphicon-trash"></span> @lang('label.delete')</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

