<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $__env->yieldContent('titolo_home'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/<?php echo $__env->yieldContent('stile'); ?>">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/myScript.js"></script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.5.6/dist/jspdf.plugin.autotable.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" class="init">
            var options = {
                "info": false,
                "lengthChange": false,
                "pageLength": 10
            };
            var mytable;
            $(document).ready(function () {
                mytable=$('#searchandorder').DataTable(options);
            });
        </script>
    </head>
    
    <body class="bg-home-page">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <!-- Left Navbar -->
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
                    <!-- Right Navbar  -->
                    <ul class="nav navbar-nav navbar-right">
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
                        <li><a href="<?php echo e(route('setLang', ['lang' => 'en'])); ?>" class="nav-link"><img src="<?php echo e(url('/')); ?>/img/flags/en.png" width="30" class="img-rounded"/></a></li>
                        <li><a href="<?php echo e(route('setLang', ['lang' => 'it'])); ?>" class="nav-link"><img src="<?php echo e(url('/')); ?>/img/flags/it.png" width="24" class="img-rounded"/></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $__env->yieldContent('inner_body'); ?>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/Climb_Training_Laravel/resources/views/layouts/home.blade.php ENDPATH**/ ?>