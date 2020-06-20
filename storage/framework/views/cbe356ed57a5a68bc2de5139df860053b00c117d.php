<?php $__env->startSection('titolo', 'Exercise Show'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('exercise.index')); ?>">Exercises List</a></li>
<li><a class="active">Show Exercise</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong>Exercise Details</strong></h2></div>
                <!-- Table -->
                <div class="col-md-12 col-xs-12">
                    <div  class="table-responsive">
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center">Reps</th>
                                    <th class="col-md-2 text-center">Sets</th>
                                    <th class="col-md-2 text-center">Rest</th>                                       
                                    <th class="col-md-2 text-center">Overweight</th>
                                    <th class="col-md-1 text-center">Unit</th>
                                    <th class="col-md-3 text-center">Tools</th>
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
                    <h2 class="panel-title"><strong>Description and Important Notes</strong></h2>
                </div>
                <div class='panel-body'>
                    <p><h3><?php echo e($exercise->description); ?><br></h3></p>
                    <div class="notice notice-warning">
                        <h4><strong>Important Notes</strong></h4>
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
                    <h2 class="panel-title"><strong>Photo</strong></h2>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/exercise/show.blade.php ENDPATH**/ ?>