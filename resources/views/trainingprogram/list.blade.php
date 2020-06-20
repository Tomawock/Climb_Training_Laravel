@extends('layout.master')

@section('titolo', 'Training Program List')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a class="active">Training Program List</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form  class="form-horizontal" name="searchForm" method="post" action="#"> 
                <div class="input-group">
                    <span class="input-group-btn">   
                        <button class="btn btn-link" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                    <input type="text" class="form-control" placeholder="Search by Title" name="search" id="search">     
                </div>
            </form>
        </div>
        <div class="col-md-offset-7 col-md-2">
            <a class="btn btn-success btn-block" href="{{ route('trainingprogram.create') }}"><span class="glyphicon glyphicon-new-window"></span> New Training Program</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3">Title</th>
                            <th class="col-md-5">Description</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($trainingprogram as $tp)
                        <tr>
                            <td>{{ $tp->title}}</td>
                            <td>{{ $tp->description}}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('trainingprogram.show', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> Show</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('trainingprogram.edit', ['trainingprogram' => $tp->id]) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('trainingprogram.destroy.confirm', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            @if ($tp->users->contains($userId))
                            <td>
                                <a class="btn btn-success btn-block" href="#"  disabled><span class="glyphicon glyphicon-plus"></span> Add</a>
                            </td>
                            @else
                            <td>
                                <a class="btn btn-success btn-block" href="{{  route('trainingprogram.addmytraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-plus"></span> Add</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection