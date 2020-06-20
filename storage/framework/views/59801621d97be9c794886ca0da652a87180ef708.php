<?php $__env->startSection('titolo'); ?>
<?php if(isset($exercise->id)): ?>
Edit exercise
<?php else: ?>
New exercise
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('exercise.index')); ?>">Exercises List</a></li>
<?php if(isset($exercise->id)): ?>
<li><a class="active">Edit Exercise</a></li>
<?php else: ?>
<li><a class="active">New Exercise</a></li>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class='col-md-12'>
             <?php if(isset($exercise->id)): ?>
                <form class="form-horizontal" enctype="multipart/form-data" name="exercise" method="post" action="<?php echo e(route('exercise.postupdate', ['id' => $exercise->id])); ?>">
            <?php else: ?>
                <form class="form-horizontal" enctype="multipart/form-data" name="exercise" method="post" action="<?php echo e(route('exercise.store')); ?>">
            <?php endif; ?>
                <?php echo e(csrf_field()); ?>

                <!-- Name of the Exercise-->
                <div class="form-group">
                    <label for="exerciseName" class="col-md-2">Name</label>
                    <div class="col-md-10">
                        <?php if(isset($exercise->id)): ?>
                            <input class="form-control" type="text" id="exerciseName" name="exerciseName" placeholder="Exercise Name" value="<?php echo e($exercise->name); ?>">
                        <?php else: ?>
                            <input class="form-control" type="text" id="exerciseName" name="exerciseName" placeholder="Exercise Name">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Description-->
                <div class="form-group">
                    <label for="exerciseDescription" class="col-md-2">Description</label>
                    <div class="col-md-10">
                         <?php if(isset($exercise->id)): ?>
                            <textarea class="form-control" rows="4" id="exerciseDescription" name="exerciseDescription" placeholder="Complete Exercise Description" ><?php echo e($exercise->description); ?></textarea>
                        <?php else: ?>
                            <textarea class="form-control" rows="4" id="exerciseDescription" name="exerciseDescription" placeholder="Complete Exercise Description"></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Important Notes -->
                <div class="form-group">
                    <label for="exerciseImportantNotes" class="col-md-2">Important Notes</label>
                    <div class="col-md-10">
                        <?php if(isset($exercise->id)): ?>
                            <textarea class="form-control" rows="2" id="exerciseImportantNotes" name="exerciseImportantNotes" placeholder="Important Notes for correct execution of the exercise"><?php echo e($exercise->importantNotes); ?></textarea>
                        <?php else: ?>
                            <textarea class="form-control" rows="2" id="exerciseImportantNotes" name="exerciseImportantNotes" placeholder="Important Notes for correct execution of the exercise"></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Photo Insertion-->
                <div class="form-group">
                    <label for="exercisePhoto" class="col-md-2"> Add Photo</label>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="exercisePhotoDescription" name="exercisePhotoDescription" placeholder="Exercise Photo Description">
                    </div>
                    <div class="col-md-5">
                        <input class="form-control-file" type="file" id="exercisePhoto" name="exercisePhoto">
                    </div>
                </div>
                <?php if(isset($exercise->id)): ?>
                    <?php if($exercise->photos->count() > 0): ?> 
                    <div class="form-group">
                        <label class="col-md-2"> Keep Photo</label>
                        <div class="col-md-10">
                            <?php $__currentLoopData = $exercise->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actualPhoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <label class="checkbox-inline">
                                <input type="checkbox" id="photo<?php echo e($actualPhoto->id); ?>" name="photo<?php echo e($actualPhoto->id); ?>" checked><?php echo e($actualPhoto->description); ?>

                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Reps -->
                <div class="form-group">
                    <label for="exerciseRepsMin" class=" col-md-2">Reps</label>
                    <label for="exerciseRepsMin" class=" col-md-1">Min</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseRepsMin" name="exerciseRepsMin">
                            <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->repsMin): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <label for="exerciseRepsMax" class="col-md-1">Max</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseRepsMax" name="exerciseRepsMax">
                            <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->repsMax): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                        </select>
                    </div>
                </div>
                <!-- Sets-->
                <div class="form-group">
                    <label for="exerciseSet" class="col-md-2">Sets</label>
                    <label for="exerciseSetMin" class="col-md-1">Min</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseSetMin" name="exerciseSetMin">
                            <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->setMin): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <label for="exerciseSetMax" class="col-md-1">Max</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseSetMax" name="exerciseSetMax">
                           <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->setMax): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>   
                <!-- Overweight-->
                <div class="form-group">
                    <label for="exerciseOverweight" class="col-md-2">Overweight</label>
                    <label for="exerciseOverweightMin" class="col-md-1">Min</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseOverweightMin" name="exerciseOverweightMin">
                            <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->overweightMin): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <label for="exerciseOverweightMax" class="col-md-1">Max</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseOverweightMax" name="exerciseOverweightMax">
                            <?php for($i = 0; $i < 50; $i++): ?>
                                <?php if(isset($exercise->id) && $i == $exercise->overweightMax): ?>
                                    <option selected><?php echo e($i); ?></option>
                                <?php else: ?>
                                    <option ><?php echo e($i); ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <label for="exerciseOverweightType" class="col-md-1">Unit</label>
                    <div class="col-md-1">
                        <select class="form-control" id="exerciseOverweightUnit" name="exerciseOverweightUnit">
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($exercise->id) && $unit == $exercise->overweightUnit): ?>
                                    <option selected><?php echo e($unit); ?></option>
                                <?php else: ?>
                                    <option><?php echo e($unit); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div> 
                </div>
                <!-- Rest-->
                <div class="form-group">
                    <label for="exerciseRest" class="col-md-2">Rest</label>
                    <label for="exerciseRestMin" class="col-md-1">Min</label>
                    <div class="col-md-2">
                        <?php if(isset($exercise->id)): ?>
                            <input type="time" id="exerciseRestMin" name="exerciseRestMin" class="form-control" min="00:00:00" max="24:59:59" value="<?php echo e($exercise->restMin); ?>" required>
                        <?php else: ?>
                            <input type="time" id="exerciseRestMin" name="exerciseRestMin" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                        <?php endif; ?>
                    </div>

                    <label for="exerciseRestMax" class="col-md-1">Max</label>
                    <div class="col-md-2">
                        <?php if(isset($exercise->id)): ?>
                            <input type="time" id="exerciseRestMax" name="exerciseRestMax" class="form-control" min="00:00:00" max="24:59:59" value="<?php echo e($exercise->restMax); ?>" required>
                        <?php else: ?>
                            <input type="time" id="exerciseRestMax" name="exerciseRestMax" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                        <?php endif; ?>
                    </div>  
                </div>
                <!-- Tecnical Tools-->
                
                <div class="form-group">
                    <label for="exerciseTecnicalTools" class="col-md-2">Tecnical Tools</label>
                    <div class="col-md-10" class="form-control">
                        <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actualTool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($exercise->id)&& $exercise->tools->contains($actualTool->id)==1): ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="tool<?php echo e($actualTool->id); ?>" name="tool<?php echo e($actualTool->id); ?>" checked><?php echo e($actualTool->name); ?>

                                </label>
                            <?php else: ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="tool<?php echo e($actualTool->id); ?>" name="tool<?php echo e($actualTool->id); ?>"><?php echo e($actualTool->name); ?>

                                </label>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- Buttons confirm-->
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <?php if(isset($exercise->id)): ?>
                            <input type="hidden" name="id" value="<?php echo e($exercise->id); ?>"/>
                            <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Save</label>
                            <input id="mySubmit" type="submit" value=\'Save\' class="hidden"/>
                        <?php else: ?>
                            <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Create</label>
                            <input id="mySubmit" type="submit" value=\'Create\' class="hidden"/>
                        <?php endif; ?>                
                    </div>
                </div>
                <!-- Buttons cancel-->
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <a href="<?php echo e(route('exercise.index')); ?>" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> Cancel</a>                         
                    </div>
                </div>                   
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/exercise/edit.blade.php ENDPATH**/ ?>