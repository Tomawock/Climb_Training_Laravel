<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.showTpTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a href="<?php echo e(route('trainingprogram.index')); ?>"><?php echo app('translator')->get('label.trainingListNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.showTpTitle'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<!-- General Information -->
<div class="container text-center">
    <div class="row">
        <div class="col-md-12"> 
            <h2>
                <stong id="title">
                    <?php echo e($trainingprogram->title); ?>

                </stong>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4"> 
            <h3>
                <span class="glyphicon glyphicon-time"></span> 
                <stong id="time"><?php echo e($trainingprogram->timeMin); ?> - <?php echo e($trainingprogram->timeMax); ?> </stong>
            </h3>
        </div>
        <div class="col-md-offset-2 col-md-2"> 
            <h3>
                <label for="downloadPdfTrainingProgram" class="btn btn-success" onclick="download()">
                    <span class="glyphicon glyphicon-download-alt"></span> <?php echo app('translator')->get('label.showTpDownloadPDF'); ?>
                </label>
            </h3>
        </div>
    </div>
</div>
<!-- Training Program Details  -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-body text-center panel-relative">
                    <h4><?php echo e($trainingprogram->description); ?></h4>
                </div>
                <!-- Table -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed text-center" id="toDowload">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.editExerciseName'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseReps'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseSets'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseRest'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseOverweight'); ?></th> 
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseTools'); ?></th>     
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $trainingprogram->exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->name); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->setMin); ?>  - <?php echo e($exercise->setMax); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?> </div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?> <?php echo e($exercise->overweightUnit); ?></div></td>     
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->myToolsToString()); ?></div></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/trainingprogram/show.blade.php ENDPATH**/ ?>