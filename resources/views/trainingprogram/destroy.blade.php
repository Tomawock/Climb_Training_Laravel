@extends('layout.master')

@section('titolo', 'Delete Training Program')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('trainingprogram.index') }}">Training Program List</a></li>
<li><a class="active">Delete Training Program</a></li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete Training Program "{{ $trainingprogram->title }}" from the list
                </h1>
            </header>
            <p class='lead'>
                Deleting Training Program. Confirm?
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
                    <p>The Training Program <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-default" href="{{ route('trainingprogram.index') }}"><span class='glyphicon glyphicon-log-out'></span> Back to Training Program list</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The Training Program <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('trainingprogram.destroy', ['id' => $trainingprogram->id]) }}"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection