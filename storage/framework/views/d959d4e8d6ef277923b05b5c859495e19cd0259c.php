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
        <div class="container">
            <div class="row" style="margin-top: 4em;">
                <div class="col-md-6 col-md-offset-3">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login-form" data-toggle="tab"><?php echo app('translator')->get('label.login'); ?></a></li>
                            <li><a href="#register-form" data-toggle="tab"><?php echo app('translator')->get('label.register'); ?></a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="login-form">
                                <form id="login-form" action="<?php echo e(route('user.login')); ?>" method="post" style="margin-top: 2em;">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="<?php echo app('translator')->get('label.mytrainingInfoUsername'); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="<?php echo app('translator')->get('label.authPassword'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" class="form-control btn btn-primary" value="<?php echo app('translator')->get('label.login'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="register-form">
                                <form id="register-form" action="<?php echo e(route('user.register')); ?>" method="post" style="margin-top: 2em;">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="<?php echo app('translator')->get('label.mytrainingInfoUsername'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="<?php echo app('translator')->get('label.mytrainingInfoName'); ?>" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="surname" class="form-control" placeholder="<?php echo app('translator')->get('label.mytrainingInfoSurname'); ?>" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="<?php echo app('translator')->get('label.mytrainingInfoEmail'); ?>" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="<?php echo app('translator')->get('label.authPassword'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" class="form-control" placeholder="<?php echo app('translator')->get('label.authPasswordConfirm'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" class="form-control btn btn-primary" value="<?php echo app('translator')->get('label.register'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body> 
</html><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/auth/auth.blade.php ENDPATH**/ ?>