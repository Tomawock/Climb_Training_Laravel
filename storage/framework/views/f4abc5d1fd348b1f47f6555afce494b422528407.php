<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.mytrainingExecuteTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a href="<?php echo e(route('mytraining.programlist')); ?>"><?php echo app('translator')->get('label.personalTrainingNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.execute'); ?></a></li>      
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <form class="form-horizontal" name="trainingProgram" method="post" action="<?php echo e(route('mytraining.postexecute',['id' => $trainingprogram->id])); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="executionDate" class="col-md-2"><?php echo app('translator')->get('label.mytrainingExecuteDate'); ?></label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="executionDate" name="executionDate" value="<?php echo e(date("d/m/Y")); ?>">
                    </div>
                </div>
                <!-- lista di tutti gli esercizi disponibili con ceckbox associate-->
                <!--tabella con ricerca-->
                <div class="panel panel-default ">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center panel-relative">
                        <h2 class="panel-title">
                            <strong><?php echo app('translator')->get('label.exercises'); ?></strong>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center"><?php echo app('translator')->get('label.editExerciseName'); ?></th>
                                        <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseReps'); ?></th>
                                        <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseSets'); ?></th>
                                        <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseRest'); ?></th>
                                        <th class="col-md-1 text-center"><?php echo app('translator')->get('label.exerciseOverweight'); ?></th>
                                        <th class="col-md-1 text-center"><?php echo app('translator')->get('label.exerciseTools'); ?></th>
                                        <th class="col-md-1 text-center"><?php echo app('translator')->get('label.exerciseRepsDone'); ?></th>
                                        <th class="col-md-1 text-center"><?php echo app('translator')->get('label.exerciseSetsDone'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $__currentLoopData = $trainingprogram->exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->name); ?></div></td>
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></div></td>
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->setMin); ?>  - <?php echo e($exercise->setMax); ?></div></td>
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?> </div></td>
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?> <?php echo e($exercise->overweightUnit); ?></div></td>     
                                        <td><div style="height:auto; overflow:hidden"><?php echo e($exercise->myToolsToString()); ?></div></td>                                    
                                        <td>
                                            <div style="height:auto; overflow:hidden">
                                                <select class="form-control" id="executedReps<?php echo e($exercise->id); ?>" name="executedReps<?php echo e($exercise->id); ?>">
                                                    <?php for($i = 0; $i <= 50; $i++): ?> 
                                                    <option><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="height:auto; overflow:hidden">
                                                <select class="form-control" id="executedSets<?php echo e($exercise->id); ?>" name="executedSets<?php echo e($exercise->id); ?>">
                                                    <?php for($i = 0; $i <= 50; $i++): ?> 
                                                    <option><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="9">
                                            <textarea class="form-control" rows="1" id="executedNotes<?php echo e($exercise->id); ?>" name="executedNotes<?php echo e($exercise->id); ?>" placeholder="<?php echo trans('label.mytrainingExecuteNote', [ 'name' => $exercise->name ]); ?>"></textarea>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Buttons confirm-->
                <input type = "hidden" name = "id" value = "<?php echo e($trainingprogram->id); ?>"/>
                <label for = "mySubmit" class = "btn btn-primary btn-large btn-block"><span class = "glyphicon glyphicon-floppy-save"></span> <?php echo app('translator')->get('label.save'); ?></label>
                <input id = "mySubmit" type = "submit" value = \'Save\' class="hidden"/>
                <!-- Buttons cancel-->
                <br>
                <a href="<?php echo e(route('mytraining.programlist')); ?>" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> <?php echo app('translator')->get('label.cancel'); ?></a>   
            </form>
        </div>   
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/execute.blade.php ENDPATH**/ ?>