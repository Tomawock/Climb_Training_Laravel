<?php $__env->startSection('titolo_home'); ?>
<?php echo app('translator')->get('label.homePageTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/index.blade.php ENDPATH**/ ?>