<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.historyStatisticNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>         
<li><a class="active"><?php echo app('translator')->get('label.historyStatisticNavbar'); ?></a></li>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <h1><?php echo app('translator')->get('label.historyStatisticErrorTitle'); ?></h1>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/historystatisticerror.blade.php ENDPATH**/ ?>