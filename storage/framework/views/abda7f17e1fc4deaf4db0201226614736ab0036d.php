<?php $__env->startSection('titolo'); ?>
<?php echo app('translator')->get('label.historyStatisticNavbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('label.homePageNavbar'); ?></a></li>         
<li><a class="active"><?php echo app('translator')->get('label.historyStatisticNavbar'); ?></a></li>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container">
    <div class="row">
        <?php for($i=0;$i< count($result['title']);$i++): ?> 
        <div class="panel panel-default ">
            <div class="panel-heading text-center panel-relative">
                <h2 class="panel-title">
                    <strong><?php echo trans('label.mytrainingHsPanelTitle', [ 'title' => $result['title'][$i], 'date' => date("d/m/Y", strtotime($result['date'][$i])) ]); ?></strong>
                </h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover text-center">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.editExerciseName'); ?></th>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseRepsSuggested'); ?></th>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseSetsSuggested'); ?></th>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseRepsExecuted'); ?></th>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseSetsExecuted'); ?></th>
                                <th class="col-md-2 text-center"><?php echo app('translator')->get('label.exerciseNotes'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($j=0;$j< count($result['exercises'][$i]['exercise']);$j++): ?>
                            <tr>     
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->name); ?></div></td>
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->repsMin); ?> - <?php echo e($result['exercises'][$i]['exercise'][$j]->repsMax); ?></div></td>
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['exercise'][$j]->setMin); ?> - <?php echo e($result['exercises'][$i]['exercise'][$j]->setMax); ?></div></td>
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->reps); ?></div></td>
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->sets); ?></div></td>
                                <td><div style="height:auto; overflow:hidden"><?php echo e($result['exercises'][$i]['execution'][$j]->note); ?></div></td>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/mytraining/historystatistic.blade.php ENDPATH**/ ?>