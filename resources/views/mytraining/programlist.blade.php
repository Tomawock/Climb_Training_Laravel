@extends('layout.master')

@section('titolo', 'Personal Training Program')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a class="active">Personal Training Program</a></li>
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
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($user->trainingprograms as $tp) 
                        <tr>
                            <td>{{$tp->title}}</td>
                            <td>{{$tp->description}}</td>
                            <td>
                                <a class="btn btn-danger btn-block" href="{{ route('mytraining.removemytraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-trash"></span> Remove</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('mytraining.executetraining', ['id' => $tp->id]) }}"><span class="glyphicon glyphicon-play"></span> Execute</a>
                            </td>
                        </tr>
                        @endforeach    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection