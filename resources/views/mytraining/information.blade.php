@extends('layout.master')

@section('titolo', 'Account Information')

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li><a class="active">Account</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong>Details</strong></h2></div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label class="col-md-6">Username</label>
                            <label class="col-md-6">{{$user->username}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">Name</label>
                            <label class="col-md-6">{{$user->name}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">Surname</label>
                            <label class="col-md-6">{{$user->surname}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">E-mail</label>
                            <label class="col-md-6">{{$user->email}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection