<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.homePageTitle'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('left_navbar'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo app('translator')->get('label.myTrainingNavbar'); ?><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('mytraining.information')); ?>"><?php echo app('translator')->get('label.accountNavbar'); ?></a></li>
        <li><a href="<?php echo e(route('mytraining.programlist')); ?>"><?php echo app('translator')->get('label.personalTrainingNavbar'); ?></a></li>
        <li><a href="<?php echo e(route('mytraining.historystatistic')); ?>"><?php echo app('translator')->get('label.historyStatisticNavbar'); ?></a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo app('translator')->get('label.trainingNavbar'); ?><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('exercise.index')); ?>"><?php echo app('translator')->get('label.exerciseListNavbar'); ?></a></li>
        <li><a href="<?php echo e(route('trainingprogram.index')); ?>"><?php echo app('translator')->get('label.trainingListNavbar'); ?></a></li>
    </ul>
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right_navbar'); ?>
<?php if(auth()->guard()->check()): ?>
<li><a><i><?php echo app('translator')->get('label.welcome'); ?> <?php echo e(Auth::user()->name); ?></i></a></li>
<li>
    <a href="<?php echo e(route('logout')); ?>" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <?php echo app('translator')->get('label.logout'); ?>
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</li>
<?php else: ?>
<li><a href="<?php echo e(route('login')); ?>"><span class="glyphicon glyphicon-user"></span> <?php echo app('translator')->get('label.login'); ?></a></li>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/index.blade.php ENDPATH**/ ?>