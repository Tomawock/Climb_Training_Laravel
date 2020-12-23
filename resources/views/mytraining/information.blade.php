@extends('layouts.master')

@section('titolo')
@lang('label.accountNavbar')
<?php if(($user->is_admin)==1){echo ' Administrator';};?>
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a class="active">@lang('label.accountNavbar')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel <?php if(($user->is_admin)==1){
                                echo 'panel-danger';
                            }else{
                                echo 'panel-default';
                            }
                            ?>">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative" color="red"><h2 class="panel-title"><strong>@lang('label.mytrainingInfoDetails')
                        <?php 
                            if(($user->is_admin)==1){
                                echo 'Administrator';
                            }
                        ?>
                        </strong>
                    </h2>
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoName')</label>
                            <label class="col-md-6">{{$user->name}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoEmail')</label>
                            <label class="col-md-6">{{$user->email}}</label>
                        </div>
                        <?php 
                            if(($user->is_admin)==0){
                        ?>
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoAdmin')number exercise</label>
                            <label class="col-md-6">{{count($exercises)}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">@lang('label.mytrainingInfoAdmin')number traning programs</label>
                            <label class="col-md-6">{{count($user->trainingprograms)}}</label>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
               if(($user->is_admin)==1){
            ?>
            <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-offset-10 col-md-2">
                        <a class="btn btn-success btn-block" href="{{ route('exercise.create') }}"><span class="glyphicon glyphicon-new-window"></span> @lang('label.editExerciseTitleCreate')</a>
                    </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
</div> 
@endsection