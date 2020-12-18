<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.destroyExerciseTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a href="<?php echo e(route('exercise.index')); ?>"><?php echo app('translator')->get('label.exerciseListNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.destroyExerciseTitle'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    <?php echo trans('label.destroyExerciseHeader', [ 'name' => $exercise->name ]); ?>

                </h1>
            </header>
            <p class='lead'>
                <?php echo app('translator')->get('label.destroyExerciseConfirm'); ?>
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    <?php echo app('translator')->get('label.revert'); ?>
                </div>
                <div class='panel-body'>
                    <p><?php echo app('translator')->get('label.destroyExerciseRevertMessage'); ?></p>
                    <p><a class="btn btn-default" href="<?php echo e(route('exercise.index')); ?>"><span class='glyphicon glyphicon-log-out'></span> <?php echo app('translator')->get('label.destroyExerciseBackMessage'); ?></a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    <?php echo app('translator')->get('label.confirm'); ?>
                </div>
                <div class='panel-body'>
                    <p><?php echo app('translator')->get('label.destroyExerciseConfirmMessage'); ?></p>
                    <p><a class="btn btn-danger" href="<?php echo e(route('exercise.destroy', ['id' => $exercise->id])); ?>"><span class='glyphicon glyphicon-trash'></span> <?php echo app('translator')->get('label.delete'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/exercise/destroy.blade.php ENDPATH**/ ?>