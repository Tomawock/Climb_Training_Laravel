<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.exerciseListNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a class="active"><?php echo app('translator')->get('label.exerciseListNavbar'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-10 col-md-2">
            <a class="btn btn-success btn-block" href="<?php echo e(route('exercise.create')); ?>"><span class="glyphicon glyphicon-new-window"></span> <?php echo app('translator')->get('label.editExerciseTitleCreate'); ?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive"><!-- da metter prima del tag table o ppoteri avere errori-->
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-3"><?php echo app('translator')->get('label.editExerciseName'); ?></</th>
                            <th class="col-md-6"><?php echo app('translator')->get('label.editExerciseDescription'); ?></</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $exerciseList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($exercise->name); ?></td>
                            <td><?php echo e($exercise->description); ?></td>
                            <td>
                                <a class="btn btn-info btn-block" href="<?php echo e(route('exercise.show', ['exercise' => $exercise->id])); ?>"><span class="glyphicon glyphicon-eye-open"></span> <?php echo app('translator')->get('label.show'); ?></a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="<?php echo e(route('exercise.edit', ['exercise' => $exercise->id])); ?>"><span class="glyphicon glyphicon-pencil"></span> <?php echo app('translator')->get('label.edit'); ?></a>
                            </td>
                            <?php if(in_array($exercise->id,$bloked)): ?>
                            <td>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('exercise.destroy.confirm', ['id' => $exercise->id])); ?>" disabled><span class="glyphicon glyphicon-trash"></span> <?php echo app('translator')->get('label.delete'); ?></a>
                            </td>
                            <?php else: ?>
                            <td>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('exercise.destroy.confirm', ['id' => $exercise->id])); ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo app('translator')->get('label.delete'); ?></a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Climb_Training_Laravel/resources/views/exercise/list.blade.php ENDPATH**/ ?>