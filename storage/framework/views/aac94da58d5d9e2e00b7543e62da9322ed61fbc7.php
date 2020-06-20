<?php $__env->startSection('titolo', 'Home page'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('left_navbar'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Training<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('mytraining.information')); ?>">Account</a></li>
        <li><a href="<?php echo e(route('mytraining.programlist')); ?>">Personal Training Program</a></li>
        <li><a href="<?php echo e(route('mytraining.historystatistic')); ?>">History and Statistics</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Training<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('exercise.index')); ?>">Exercise List</a></li>
        <li><a href="<?php echo e(route('trainingprogram.index')); ?>">Training Program List</a></li>
    </ul>
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right_navbar'); ?>
<?php if($logged): ?>
<li><a><i>Welcome <?php echo e($loggedName); ?></i></a></li>
<li><a href="<?php echo e(route('user.logout')); ?>">logout <span class="glyphicon glyphicon-log-out"></span></a></li>
<?php else: ?>
<li><a href="<?php echo e(route('user.login')); ?>"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/index.blade.php ENDPATH**/ ?>