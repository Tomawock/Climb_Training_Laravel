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
    <script>feedbackPositive("{{Session::has('success')}}", "{{Session::get('success')}}");</script>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-1">
                                <select id="filter-owner" data-column="0">
                                    <option value="" selected>@lang('label.allOwners')</option>
                                    <option value="{{$user->name}}">@lang('label.youOwner')</option>    
                                </select>
                            </th>
                            <th class="col-md-3">
                                <input id="filter-title" class="form-control" type="text" placeholder="@lang('label.searchByTitle')" value="" data-column="1"/>
                            </th>
                            <th class="col-md-5">
                                <input id="filter-description" class="form-control" type="text" placeholder="@lang('label.searchByDescription')" value="" data-column="2"/>
                            </th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1">
                               <a class="btn btn-success btn-block" href="{{ route('trainingprogram.create') }}">
                                    <span class="glyphicon glyphicon-new-window"></span>@lang('label.editTpCreate')
                                </a>
                            </th>   
                        </tr>
                        <tr>
                            <th class="col-md-1">@lang('label.owner')</th>
                            <th class="col-md-3">@lang('label.trainingprogramTitle')</th>
                            <th class="col-md-5">@lang('label.editTpDescription')</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Allenamenti degli Admin quelli copiabili-->
                        @foreach($trainingprogram as $tp)
                        <tr>
                            <td>{{ $tp->user->name}}</td>
                            <td>{{ $tp->title}}</td>
                            <td>{{ $tp->description}}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('trainingprogram.show', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> @lang('label.show')</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('trainingprogram.copy', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-plus"></span> @lang('label.copy')</a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                        <!-- Allenamenti dell'utente ovvero quelli cancellabili-->
                        @foreach($usertrainingprogram as $tp)
                        <tr>
                            <td>{{ $tp->user->name}}</td>
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
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection