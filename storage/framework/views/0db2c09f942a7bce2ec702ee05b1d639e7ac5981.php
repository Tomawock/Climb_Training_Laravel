<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $__env->yieldContent('titolo'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/<?php echo $__env->yieldContent('stile'); ?>">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
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
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($logged): ?>
                        <li><a><i><?php echo app('translator')->get('label.welcome'); ?> <?php echo e($loggedName); ?></i></a></li>
                        <li><a href="<?php echo e(route('user.logout')); ?>"><?php echo app('translator')->get('label.logout'); ?> <span class="glyphicon glyphicon-log-out"></span></a></li>
                        <?php else: ?>
                        <li><a href="<?php echo e(route('user.login')); ?>"><span class="glyphicon glyphicon-user"></span> <?php echo app('translator')->get('label.login'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <ul class="breadcrumb pull-right">
                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ul>
        </div>

        <div class="container">
            <header class="header-sezione">
                <h1>
                    <?php echo $__env->yieldContent('titolo'); ?>
                </h1>
            </header>
        </div>
        <?php echo $__env->yieldContent('corpo'); ?>
    </body>
</html><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/layout/master.blade.php ENDPATH**/ ?>