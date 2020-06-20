@extends('layout.master')

@section('titolo', 'Exercises List')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a class="active">Exercises List</a></li>
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
                    <input type="text" class="form-control" placeholder="Search by Name" name="search" id="search">     
                </div>
            </form>
        </div>
        <div class="col-md-offset-7 col-md-2">
            <a class="btn btn-success btn-block" href="{{ route('exercise.create') }}"><span class="glyphicon glyphicon-new-window"></span> New Exercise</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive"><!-- da metter prima del tag table o ppoteri avere errori-->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-6">Description</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exerciseList as $exercise)
                        <tr>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>
                                <a class="btn btn-info btn-block" href="{{ route('exercise.show', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-eye-open"></span> Show</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('exercise.destroy.confirm', ['id' => $exercise->id]) }}"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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