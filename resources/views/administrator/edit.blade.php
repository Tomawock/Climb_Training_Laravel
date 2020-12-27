@extends('layouts.master')

@section('titolo')
@lang('label.editExerciseTitleAdmin')
@endsection

@section('stile', 'style.css')

@section('breadcrumb')
<li><a href="{{ route('home') }}">@lang('label.homePageNavbar')</a></li>
<li><a href="{{ route('mytraining.information') }}">@lang('label.accountNavbar')</a></li>
<li><a class="active">@lang('label.editExerciseTitleAdmin')</a></li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            @if(isset($exercise->id))
            <form class="form-horizontal" enctype="multipart/form-data" name="exercise" method="post" action="{{ route('exercise.postupdate', ['id' => $exercise->id]) }}">
                @else
                <form class="form-horizontal" enctype="multipart/form-data" name="exercise" method="post" action="{{ route('administrator.store') }}">
                    @endif
                    {{csrf_field()}}
                    <!-- Name of the Exercise-->
                    <div class="form-group @error('exerciseName') has-error @enderror">
                        <label for="exerciseName" class="col-md-2">@lang('label.editExerciseName')</label>
                        <div class="col-md-10">
                            @if(isset($exercise->id))
                            <input class="form-control" type="text" id="exerciseName" name="exerciseName" placeholder="@lang('label.editExerciseNamePH')" value="{{ $exercise->name }}">
                            @else
                            <input class="form-control" type="text" id="exerciseName" name="exerciseName" placeholder="@lang('label.editExerciseNamePH')">
                            @endif

                            @error('exerciseName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Description-->
                    <div class="form-group @error('exerciseDescription') has-error @enderror">
                        <label for="exerciseDescription" class="col-md-2">@lang('label.editExerciseDescription')</label>
                        <div class="col-md-10">
                            @if(isset($exercise->id))
                            <textarea class="form-control" rows="4" id="exerciseDescription" name="exerciseDescription" placeholder="@lang('label.editExerciseDescriptionPH')" >{{ $exercise->description }}</textarea>
                            @else
                            <textarea class="form-control" rows="4" id="exerciseDescription" name="exerciseDescription" placeholder="@lang('label.editExerciseDescriptionPH')"></textarea>
                            @endif

                            @error('exerciseDescription')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Important Notes -->
                    <div class="form-group @error('exerciseImportantNotes') has-error @enderror">
                        <label for="exerciseImportantNotes" class="col-md-2">@lang('label.editExerciseImportantNotes')</label>
                        <div class="col-md-10">
                            @if(isset($exercise->id))
                            <textarea class="form-control" rows="2" id="exerciseImportantNotes" name="exerciseImportantNotes" placeholder="@lang('label.editExerciseImportantNotesPH')">{{ $exercise->importantNotes }}</textarea>
                            @else
                            <textarea class="form-control" rows="2" id="exerciseImportantNotes" name="exerciseImportantNotes" placeholder="@lang('label.editExerciseImportantNotesPH')"></textarea>
                            @endif

                            @error('exerciseImportantNotes')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>               
                    <!-- Photo Insertion-->
                    <div class="form-group @error('exercisePhotoDescription','exercisePhoto') has-error @enderror" enctype="multipart/form-data" >  
                        <label for="exercisePhoto" class="col-md-2">@lang('label.editExerciseAddPhoto')</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" id="exercisePhotoDescription" name="exercisePhotoDescription" placeholder="@lang('label.editExerciseAddPhotoPH')">
                        @error('exercisePhotoDescription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-5">
                            <input class="form-control-file" type="file" accept="image/*" id="exercisePhoto" name="exercisePhoto">
                            @error('exercisePhoto')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    @if(isset($exercise->id))
                    @if($exercise->photos->count() > 0) 
                    <div class="form-group">
                        <label class="col-md-2">@lang('label.editExerciseKeepPhoto')</label>
                        <div class="col-md-10">
                            @foreach ($exercise->photos as $actualPhoto) 
                            <label class="checkbox-inline">
                                <input type="checkbox" id="photo{{ $actualPhoto->id }}" name="photo{{ $actualPhoto->id }}" checked>{{ $actualPhoto->description }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif
                    <!-- Reps -->
                    <div class="form-group">
                        <label for="exerciseRepsMin" class=" col-md-2">@lang('label.exerciseReps')</label>
                        <label for="exerciseRepsMin" class=" col-md-1">@lang('label.min')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseRepsMin" name="exerciseRepsMin">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->repsMin)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor
                            </select>
                        </div>

                        <label for="exerciseRepsMax" class="col-md-1">@lang('label.max')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseRepsMax" name="exerciseRepsMax">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->repsMax)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor

                            </select>
                        </div>
                    </div>
                    <!-- Sets-->
                    <div class="form-group">
                        <label for="exerciseSet" class="col-md-2">@lang('label.exerciseSets')</label>
                        <label for="exerciseSetMin" class="col-md-1">@lang('label.min')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseSetMin" name="exerciseSetMin">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->setMin)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor
                            </select>
                        </div>

                        <label for="exerciseSetMax" class="col-md-1">@lang('label.max')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseSetMax" name="exerciseSetMax">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->setMax)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor
                            </select>
                        </div>
                    </div>   
                    <!-- Overweight-->
                    <div class="form-group">
                        <label for="exerciseOverweight" class="col-md-2">@lang('label.exerciseOverweight')</label>
                        <label for="exerciseOverweightMin" class="col-md-1">@lang('label.min')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseOverweightMin" name="exerciseOverweightMin">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->overweightMin)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor
                            </select>
                        </div>

                        <label for="exerciseOverweightMax" class="col-md-1">@lang('label.max')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseOverweightMax" name="exerciseOverweightMax">
                                @for ($i = 0; $i < 50; $i++)
                                @if(isset($exercise->id) && $i == $exercise->overweightMax)
                                <option selected>{{ $i }}</option>
                                @else
                                <option >{{ $i }}</option>
                                @endif
                                @endfor
                            </select>
                        </div>
                        <label for="exerciseOverweightType" class="col-md-1">@lang('label.exerciseUnit')</label>
                        <div class="col-md-1">
                            <select class="form-control" id="exerciseOverweightUnit" name="exerciseOverweightUnit">
                                @foreach ($units as $unit)
                                @if(isset($exercise->id) && $unit == $exercise->overweightUnit)
                                <option selected>{{ $unit }}</option>
                                @else
                                <option>{{ $unit }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div> 
                    </div>
                    <!-- Rest-->
                    <div class="form-group">
                        <label for="exerciseRest" class="col-md-2">@lang('label.exerciseRest')</label>
                        <label for="exerciseRestMin" class="col-md-1">@lang('label.min')</label>
                        <div class="col-md-2">
                            @if(isset($exercise->id))
                            <input type="time" id="exerciseRestMin" name="exerciseRestMin" class="form-control" min="00:00:00" max="24:59:59" step="1" value="{{ $exercise->restMin }}" required>
                            @else
                            <input type="time" id="exerciseRestMin" name="exerciseRestMin" class="form-control" min="00:00:00" max="24:59:59" step="1" value="00:00:00" required>
                            @endif
                        </div>

                        <label for="exerciseRestMax" class="col-md-1">@lang('label.max')</label>
                        <div class="col-md-2">
                            @if(isset($exercise->id))
                            <input type="time" id="exerciseRestMax" name="exerciseRestMax" class="form-control" min="00:00:00" max="24:59:59" step="1" value="{{ $exercise->restMax }}" required>
                            @else
                            <input type="time" id="exerciseRestMax" name="exerciseRestMax" class="form-control" min="00:00:00" max="24:59:59" step="1" value="00:00:00" required>
                            @endif
                        </div>  
                    </div>
                    <!-- Tecnical Tools-->
                    <div class="form-group">
                        <label for="exerciseTecnicalTools" class="col-md-2">@lang('label.exerciseTools')</label>
                        <div class="col-md-10" class="form-control">
                            @foreach($tools as $actualTool)
                            @if(isset($exercise->id)&& $exercise->tools->contains($actualTool->id)==1)
                            <label class="checkbox-inline">
                                <input type="checkbox" id="tool{{ $actualTool->id}}" name="tool{{ $actualTool->id}}" checked>{{ $actualTool->name }}
                            </label>
                            @else
                            <label class="checkbox-inline">
                                <input type="checkbox" id="tool{{ $actualTool->id}}" name="tool{{ $actualTool->id}}">{{ $actualTool->name }}
                            </label>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Buttons confirm-->
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            @if(isset($exercise->id))
                            <input type="hidden" name="id" value="{{$exercise->id}}"/>
                            <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> @lang('label.save')</label>
                            <input id="mySubmit" type="submit" value=\'Save\' class="hidden"/>
                            @else
                            <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> @lang('label.create')</label>
                            <input id="mySubmit" type="submit" value=\'Create\' class="hidden"/>
                            @endif                
                        </div>
                    </div>
                    <!-- Buttons cancel-->
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <a href="{{ route('exercise.index') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> @lang('label.revert')</a>                         
                        </div>
                    </div>  
    </div>
</div>
</div>
@endsection