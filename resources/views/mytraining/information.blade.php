@extends('layouts.master')

@section('titolo')
<?php if(($user->is_admin)==1){?>
@lang('label.accountNavbar') @lang('label.administrator')
<?php }else{?>
@lang('label.accountNavbar')
<?php } ?>
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
                        <?php if(($user->is_admin)==1){?>
                            @lang('label.administrator')
                        <?php } ?>
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
                            <label class="col-md-6">@lang('label.number_exercise')</label>
                            <label class="col-md-6">{{count($exercises)}}</label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">@lang('label.traningPrograms')</label>
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
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block" href="{{ route('administrator.userslist') }}"><span class="glyphicon glyphicon-new-window"></span> @lang('label.userList')</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success btn-block" href="{{ route('administrator.newexercise') }}"><span class="glyphicon glyphicon-new-window"></span> @lang('label.editExerciseTitleCreate')</a>
                    </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
</div> 
@endsection