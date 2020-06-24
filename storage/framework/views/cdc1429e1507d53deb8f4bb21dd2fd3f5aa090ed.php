<!DOCTYPE html>
<htm>
    <head>
        <meta charset="UTF-8">
        <title><?php echo app('translator')->get('label.userAuthNavbar'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container text-center">
            <div class="row" style="margin-top: 4em;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-danger">
                        <div class='panel-heading'>
                            <?php echo app('translator')->get('label.authErrortitle'); ?>
                        </div>
                        <div class='panel-body'>
                            <p><?php echo app('translator')->get('label.authWrongcredential'); ?></p>
                            <p><a class="btn btn-default" href="<?php echo e(route('home')); ?>"><span class='glyphicon glyphicon-log-out'></span> <?php echo app('translator')->get('label.authBackToHome'); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </body>
</htm><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/auth/authErrorPage.blade.php ENDPATH**/ ?>