<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.personalTrainingNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.personalTrainingNavbar'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form  class="form-horizontal" name="searchForm" method="post" action="#"> 
                <div class="input-group">
                    <span class="input-group-btn">   
                        <button class="btn btn-link" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                    <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('label.search'); ?>" name="search" id="search">     
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3"><?php echo app('translator')->get('label.trainingprogramTitle'); ?></th>
                            <th class="col-md-5"><?php echo app('translator')->get('label.editExerciseDescription'); ?></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th> 
                        </tr>
                    </thead>
                    <tbody> 
                        <?php $__currentLoopData = $user->trainingprograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($tp->title); ?></td>
                            <td><?php echo e($tp->description); ?></td>
                            <td>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('mytraining.removemytraining', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo app('translator')->get('label.remove'); ?></a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="<?php echo e(route('mytraining.executetraining', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-play"></span> <?php echo app('translator')->get('label.execute'); ?></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/programlist.blade.php ENDPATH**/ ?>