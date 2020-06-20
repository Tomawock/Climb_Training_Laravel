<?php $__env->startSection('titolo', 'History and Statistics'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>         
<li><a class="active">History and Statistics</a></li>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <?php for($i=0;$i< count($result['title']);$i++): ?> 
        <div class="panel panel-default ">
            <div class="panel-heading text-center panel-relative">
                <h2 class="panel-title">
                    <strong> Training: <?php echo e($result['title'][$i]); ?> executed on Date: <?php echo e(date("d/m/Y", strtotime($result['date'][$i]))); ?></strong>
                </h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover text-center">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Name</th>
                                <th class="col-md-2 text-center">Reps Suggested</th>
                                <th class="col-md-2 text-center">Sets Suggested</th>
                                <th class="col-md-2 text-center">Reps Executed</th>
                                <th class="col-md-2 text-center">Sets executed</th>
                                <th class="col-md-2 text-center">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($j=0;$j< count($result['exercises'][$i]['exercise']);$j++): ?>
                            <tr>     
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->name); ?></div></td>
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->repsMin); ?> - <?php echo e($result['exercises'][$i]['exercise'][$j]->repsMax); ?></div></td>
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->setMin); ?> - <?php echo e($result['exercises'][$i]['exercise'][$j]->setMax); ?></div></td>
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->reps); ?></div></td>
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->sets); ?></div></td>
                                <td><div style="height:50px; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->note); ?></div></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/historystatistic.blade.php ENDPATH**/ ?>