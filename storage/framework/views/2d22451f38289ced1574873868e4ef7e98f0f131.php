<?php $__env->startSection('titolo', 'Training Program List'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a class="active">Training Program List</a></li>
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
                    <input type="text" class="form-control" placeholder="Search by Title" name="search" id="search">     
                </div>
            </form>
        </div>
        <div class="col-md-offset-7 col-md-2">
            <a class="btn btn-success btn-block" href="<?php echo e(route('trainingprogram.create')); ?>"><span class="glyphicon glyphicon-new-window"></span> New Training Program</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3">Title</th>
                            <th class="col-md-5">Description</th>
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
                                <a class="btn btn-info btn-block" href="<?php echo e(route('trainingprogram.show', ['trainingprogram' => $tp->id])); ?>"><span class="glyphicon glyphicon-eye-open"></span> Show</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="<?php echo e(route('trainingprogram.edit', ['trainingprogram' => $tp->id])); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('trainingprogram.destroy.confirm', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            <?php if($tp->users->contains($userId)): ?>
                            <td>
                                <a class="btn btn-success btn-block" href="#"  disabled><span class="glyphicon glyphicon-plus"></span> Add</a>
                            </td>
                            <?php else: ?>
                            <td>
                                <a class="btn btn-success btn-block" href="<?php echo e(route('trainingprogram.addmytraining', ['id' => $tp->id])); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
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