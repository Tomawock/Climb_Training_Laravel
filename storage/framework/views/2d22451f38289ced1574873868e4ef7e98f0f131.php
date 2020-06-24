<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.trainingListNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>
<li><a href="<?php echo e(route('trainingprogram.index')); ?>"><?php echo app('translator')->get('label.trainingListNavbar'); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-10 col-md-2">
            <a class="btn btn-success btn-block" href="<?php echo e(route('trainingprogram.create')); ?>"><span class="glyphicon glyphicon-new-window"></span> <?php echo app('translator')->get('label.editTpCreate'); ?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" id='searchandorder'>
                    <thead>
                        <tr>
                            <th class="col-md-3"><?php echo app('translator')->get('label.trainingprogramTitle'); ?></th>
                            <th class="col-md-5"><?php echo app('translator')->get('label.editTpDescription'); ?></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $trainingprogram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($tp->title); ?></td>
                            <td><?php echo e($tp->description); ?></td>
                            <td>
                                <a class="btn btn-info btn-block" href="<?php echo e(route('trainingprogram.show', ['trainingprogram' => $tp->id])); ?>"><span class="glyphicon glyphicon-eye-open"></span> <?php echo app('translator')->get('label.show'); ?></a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="<?php echo e(route('trainingprogram.edit', ['trainingprogram' => $tp->id])); ?>"><span class="glyphicon glyphicon-pencil"></span> <?php echo app('translator')->get('label.edit'); ?></a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('trainingprogram.destroy.confirm', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo app('translator')->get('label.delete'); ?></a>
                            </td>
                            <?php if($tp->users->contains($userId)): ?>
                            <td>
                                <a class="btn btn-success btn-block" href="#"  disabled><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('label.add'); ?></a>
                            </td>
                            <?php else: ?>
                            <td>
                                <a class="btn btn-success btn-block" href="<?php echo e(route('trainingprogram.addmytraining', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('label.add'); ?></a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/trainingprogram/list.blade.php ENDPATH**/ ?>