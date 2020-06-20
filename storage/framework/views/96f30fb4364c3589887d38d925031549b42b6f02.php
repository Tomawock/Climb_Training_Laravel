<?php $__env->startSection('titolo', 'Account Information'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a class="active">Account</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-heading text-center panel-relative"><h2 class="panel-title"><strong>Details</strong></h2></div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label class="col-md-6">Username</label>
                            <label class="col-md-6"><?php echo e($user->username); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">Name</label>
                            <label class="col-md-6"><?php echo e($user->name); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">Surname</label>
                            <label class="col-md-6"><?php echo e($user->surname); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-md-6">E-mail</label>
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