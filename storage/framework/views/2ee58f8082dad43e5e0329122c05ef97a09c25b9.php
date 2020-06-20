<?php $__env->startSection('titolo'); ?>
<?php if(isset($trainingprogram->id)): ?>
Edit Training Program
<?php else: ?>
New Training Program
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('trainingprogram.index')); ?>">Training Program List</a></li>
<?php if(isset($trainingprogram->id)): ?>
<li><a class="active">Edit Training Program</a></li>
<?php else: ?>
<li><a class="active">New Training Program</a></li>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <?php if(isset($trainingprogram->id)): ?>
            <form class="form-horizontal" enctype="multipart/form-data" name="trainingprogram" method="get" action="<?php echo e(route('trainingprogram.update', ['id' => $trainingprogram->id])); ?>">
                <?php else: ?>
                <form class="form-horizontal" enctype="multipart/form-data" name="trainingprogram" method="post" action="<?php echo e(route('trainingprogram.store')); ?>">
                    <?php endif; ?>
                    <?php echo e(csrf_field()); ?> 
                    <!-- Title of the Training Program-->
                    <div class="form-group">
                        <label for="trainingProgramTitle" class="col-md-2">Title</label>
                        <div class="col-md-10">
                            <?php if(isset($trainingprogram->id)): ?>
                            <input class="form-control" type="text" id="trainingProgramTitle" name="trainingProgramTitle" placeholder="Training Program Title" value="<?php echo e($trainingprogram->title); ?>">
                            <?php else: ?> 
                            <input class="form-control" type="text" id="trainingProgramTitle" name="trainingProgramTitle" placeholder="Training Program Title">
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Description-->
                    <div class="form-group">
                        <label for="trainingProgramDescription" class="col-md-2">Description</label>
                        <div class="col-md-10">
                            <?php if(isset($trainingprogram->id)): ?>
                            <textarea class="form-control" rows="4" id="trainingProgramDescription" name="trainingProgramDescription"><?php echo e($trainingprogram->description); ?></textarea>
                            <?php else: ?>
                            <textarea class="form-control" rows="4" id="trainingProgramDescription" name="trainingProgramDescription" placeholder="Complete Training Program Description"></textarea>
                            <?php endif; ?>     
                        </div>
                    </div>
                    <!-- Time Averange fo the completment of the Training program -->
                    <div class="form-group">
                        <label for="trainingProgramTime" class="col-md-2">Time</label>
                        <label for="trainingProgramTimeMin" class="col-md-1">Min</label>
                        <div class="col-md-2">
                            <?php if(isset($trainingprogram->id)): ?>
                            <input type="time" id="trainingProgramTimeMin" name="trainingProgramTimeMin" class="form-control" min="00:00:00" max="24:59:59" value="<?php echo e($trainingprogram->timeMin); ?>" required>
                            <?php else: ?> 
                            <input type="time" id="trainingProgramTimeMin" name="trainingProgramTimeMin" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                            <?php endif; ?>
                        </div>
                        <label for="trainingProgramTimeMax" class="col-md-1">Max</label>
                        <div class="col-md-2">
                            <?php if(isset($trainingprogram->id)): ?>
                            <input type="time" id="trainingProgramTimeMax" name="trainingProgramTimeMax" class="form-control" min="00:00:00" max="24:59:59" value="<?php echo e($trainingprogram->timeMax); ?>" required>
                            <?php else: ?>
                            <input type="time" id="trainingProgramTimeMax" name="trainingProgramTimeMax" class="form-control" min="00:00:00" max="24:59:59" value="00:00:00" required>
                            <?php endif; ?>
                        </div>
                    </div>                       
                    <!-- lista di tutti gli esercizi disponibili con ceckbox associate-->
                    <!--tabella con ricerca-->
                    <div class="panel panel-default ">
                        <!-- Default panel contents -->
                        <div class="panel-heading text-center panel-relative">
                            <h2 class="panel-title">
                                <strong>Exercises</strong>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Search Name">
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-link" type="submit"><span class="glyphicon glyphicon-search"></span> Submit</a>
                            </div>

                            <div class="col-md-1">
                                <label for="orderTrainingProgramReps" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span> Reps</label>
                                <input id="orderTrainingProgramReps" type="submit" value='orderReps' class="hidden"/>      
                            </div>
                            <div class="col-md-1">
                                <label for="orderTrainingProgramSetss" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span> Sets</label>
                                <input id="orderTrainingProgramSets" type="submit" value='orderSets' class="hidden"/>      
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">Name</th>
                                        <th class="col-md-2 text-center">Reps</th>
                                        <th class="col-md-2 text-center">Sets</th>
                                        <th class="col-md-2 text-center">Rest</th>
                                        <th class="col-md-2 text-center">Overweight</th> 
                                        <th class="col-md-1 text-center">Tools</th>
                                        <th class="col-md-1 text-center">Selected</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($trainingprogram->id)): ?>
                                    <?php $__currentLoopData = $allExercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->name); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->setMin); ?>  - <?php echo e($exercise->setMax); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?> </div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?> <?php echo e($exercise->overweightUnit); ?></div></td>     
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->myToolsToString()); ?></div></td>
                                        <?php if($trainingprogram->exercises->contains($exercise->id) == 1): ?> 
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise<?php echo e($exercise->id); ?>" checked></div></td>
                                        <?php else: ?>
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise<?php echo e($exercise->id); ?>"></div></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $allExercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <tr>                                           
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->name); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->setMin); ?>  - <?php echo e($exercise->setMax); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?> </div></td>
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?> <?php echo e($exercise->overweightUnit); ?></div></td>     
                                        <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->myToolsToString()); ?></div></td>
                                        <td><div style="height:50px; overflow:hidden"><input type="checkbox" name="exercise<?php echo e($exercise->id); ?>"></div></td>  
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Buttons confirm-->
                    <?php if(isset($trainingprogram->id)): ?>
                    <input type="hidden" name="id" value="<?php echo e($trainingprogram->id); ?>"/>
                    <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Save</label>
                    <input id="mySubmit" type="submit" value=\'Save\' class="hidden"/>
                    <?php else: ?>
                    <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Create</label>
                    <input id="mySubmit" type="submit" value=\'Create\' class="hidden"/>
                    <?php endif; ?>                
                    <a href="<?php echo e(route('trainingprogram.index')); ?>" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> Cancel</a>                         
                </form>
        </div>   
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/trainingprogram/edit.blade.php ENDPATH**/ ?>