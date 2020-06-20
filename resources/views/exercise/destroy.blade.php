@extends('layout.master')

@section('titolo', 'Delete Exercise')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('exercise.index') }}">Exercises List</a></li>
<li><a class="active">Delete Exercise</a></li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete exercise "{{ $exercise->name }}" from the list
                </h1>
            </header>
            <p class='lead'>
                Deleting exercise. Confirm?
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Revert
                </div>
                <div class='panel-body'>
                    <p>The exercise <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-default" href="{{ route('exercise.index') }}"><span class='glyphicon glyphicon-log-out'></span> Back to Exercise list</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The exercise <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('exercise.destroy', ['id' => $exercise->id]) }}"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection