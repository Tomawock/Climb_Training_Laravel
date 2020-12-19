<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.showExerciseTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a href="<?php echo e(route('exercise.index')); ?>"><?php echo app('translator')->get('label.exerciseListNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.showExerciseTitle'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong><?php echo app('translator')->get('label.showExerciseTableTitle'); ?></strong></h2></div>
                <!-- Table -->
                <div class="col-md-12 col-xs-12">
                    <div  class="table-responsive">
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseReps'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseSets'); ?></th>
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseRest'); ?></th>                                       
                                    <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseOverweight'); ?></th>
                                    <th class="col-md-1 text-center"><?php echo app('translator')->get('label.exerciseUnit'); ?></th>
                                    <th class="col-md-3 text-center"><?php echo app('translator')->get('label.exerciseTools'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="success">
                                    <td><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></td>
                                    <td><?php echo e($exercise->setMin); ?> - <?php echo e($exercise->setMax); ?></td>
                                    <td><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?></td>
                                    <td><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?></td>
                                    <td><?php echo e($exercise->overweightUnit); ?></td>
                                    <td><?php echo e($toolsString); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container">
    <div class="row">
        <!-- Description and important Notes -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class='panel-heading text-center panel-relative'>
                    <h2 class="panel-title"><strong><?php echo app('translator')->get('label.showExerciseDesciptionTitle'); ?></strong></h2>
                </div>
                <div class='panel-body'>
                    <p><h3><?php echo e($exercise->description); ?><br></h3></p>
                    <div class="notice notice-warning">
                        <h4><strong><?php echo app('translator')->get('label.editExerciseImportantNotes'); ?></strong></h4>
                        <p>
                        <h4><?php echo e($exercise->importantNotes); ?></h4>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide show delle immagino con i botoni -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class='panel-heading text-center panel-relative'>
                    <h2 class="panel-title"><strong><?php echo app('translator')->get('label.showExercisePhotoTitle'); ?></strong></h2>
                </div>
                <div class='panel-body'>
                    <?php $__currentLoopData = $exercise->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <img src="<?php echo e(asset($ph->path)); ?>" class="img-thumbnail img-responsive"><!-- necessiti di link vistuale per far vedere le immagini -->
                    <figcaption class="figure-caption text-center "><?php echo e($ph->description); ?></figcaption>
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Climb_Training_Laravel/resources/views/exercise/show.blade.php ENDPATH**/ ?>