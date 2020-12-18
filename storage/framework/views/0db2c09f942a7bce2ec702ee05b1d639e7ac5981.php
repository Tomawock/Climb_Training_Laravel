<?php $__env->startSection('titolo_home'); ?>
<?php echo $__env->yieldContent('titolo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('inner_body'); ?>
<div class="container">
    <ul class="breadcrumb pull-right">
        <?php echo $__env->yieldContent('breadcrumb'); ?>
    </ul>
</div>

<div class="container">
    <div class="panel panel-default ">
    <header class="header-sezione">
        <h1>
            <?php echo $__env->yieldContent('titolo'); ?>
        </h1>
    </header>
    <?php echo $__env->yieldContent('corpo'); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/layout/master.blade.php ENDPATH**/ ?>