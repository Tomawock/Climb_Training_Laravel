<?php $__env->startSection('titolo', 'Delete Training Program'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('trainingprogram.index')); ?>">Training Program List</a></li>
<li><a class="active">Delete Training Program</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete Training Program "<?php echo e($trainingprogram->title); ?>" from the list
                </h1>
            </header>
            <p class='lead'>
                Deleting Training Program. Confirm?
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Revert
                </div>
                <div class='panel-body'>
                    <p>The Training Program <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-default" href="<?php echo e(route('trainingprogram.index')); ?>"><span class='glyphicon glyphicon-log-out'></span> Back to Training Program list</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The Training Program <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="<?php echo e(route('trainingprogram.destroy', ['id' => $trainingprogram->id])); ?>"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/trainingprogram/destroy.blade.php ENDPATH**/ ?>