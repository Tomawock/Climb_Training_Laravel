@extends('layouts.master')

@section('titolo')
@lang('label.exerciseListNavbar')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a class="active">@lang('label.exerciseListNavbar')</a></li>
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
                                <select id="filter-owner">
                                    <option value="" selected>@lang('label.allOwners')</option>
                                    <option value="{{$user->name}}">@lang('label.youOwner')</option>
                                </select>
                            </th>
                            <th class="col-md-3">
                                <input id="filter-title" class="form-control" type="text" placeholder="@lang('label.searchByTitle')" value=""/>
                            </th>
                            <th class="col-md-5">
                                <input id="filter-description" class="form-control" type="text" placeholder="@lang('label.searchByDescription')" value="" />
                            </th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1">
                                <a class="btn btn-success btn-block" href="{{ route('exercise.create') }}">
                                    <span class="glyphicon glyphicon-new-window"></span>@lang('label.editExerciseTitleCreate')
                                </a>
                            </th>   
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
                        <!-- Esercizi degli admin-->
                        @foreach($exerciseList as $exercise)
                        <tr>
                            <td>{{ $exercise->user->name}}</td>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('exercise.show', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('exercise.copy', ['id' => $exercise->id]) }}"><span class="glyphicon glyphicon-plus"></span> @lang('label.copy')</a>
                            </td>
                            <!-- Gestire i bottoni in un modo piu bello, quelli dell'admin ne dovrebbero avere solo2 invece quelli dell'utente ne devono avere 3-->
                            <td></td>
                        </tr>
                        @endforeach
                        <!-- Esercizi dell'utente ovvero quelli cancellabili-->
                        @foreach($userExercise as $exercise)
                        <tr>
                            <td>{{ $exercise->user->name}}</td>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('exercise.show', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <!-- Cancellare e sostituire con copia e modifica su soli gli esercizi dell'utente--> 
                            @if(in_array($exercise->id,$bloked))
                            <td>
                                <a class="btn btn-primary btn-block" href="#" disabled><span class="glyphicon glyphicon-pencil"></span> @lang('label.edit')</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="#" disabled><span class="glyphicon glyphicon-trash"></span> @lang('label.delete')</a>
                            </td>
                            @else
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-pencil"></span> @lang('label.edit')</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('exercise.destroy.confirm', ['id' => $exercise->id]) }}"><span class="glyphicon glyphicon-trash"></span> @lang('label.delete')</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

