<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.accountNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.accountNavbar'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong><?php echo app('translator')->get('label.mytrainingInfoDetails'); ?></strong></h2></div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label class="col-md-6"><?php echo app('translator')->get('label.mytrainingInfoUsername'); ?></label>
                            <label class="col-md-6"><?php echo e($user->username); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6"><?php echo app('translator')->get('label.mytrainingInfoName'); ?></label>
                            <label class="col-md-6"><?php echo e($user->name); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6"><?php echo app('translator')->get('label.mytrainingInfoSurname'); ?></label>
                            <label class="col-md-6"><?php echo e($user->surname); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6"><?php echo app('translator')->get('label.mytrainingInfoEmail'); ?></label>
                            <label class="col-md-6"><?php echo e($user->email); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/information.blade.php ENDPATH**/ ?>