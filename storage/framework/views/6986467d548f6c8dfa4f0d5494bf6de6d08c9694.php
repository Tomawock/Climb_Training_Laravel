<?php $__env->startSection('titolo', 'Show Training Program'); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('trainingprogram.index')); ?>">Training Program List</a></li>
<li><a class="active">Show Training Program </a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<!-- General Information -->
<div class="container text-center">
    <div class="row">
        <div class="col-md-offset-4 col-md-4"> 
            <h3>
                <stong>
                    <span class="glyphicon glyphicon-time"></span> <?php echo e($trainingprogram->timeMin); ?> - <?php echo e($trainingprogram->timeMax); ?>

                </stong>
            </h3>
        </div>
        <div class="col-md-2"> 
            <h3>
                <label for="downloadPdfTrainingProgram" class="btn btn-success">
                    <span class="glyphicon glyphicon-download-alt"></span> Dowload PDF
                </label>
                <input id="downloadPdfTrainingProgram" type="submit" value='downloadPDF' class="hidden"/> 
            </h3>
        </div>
        <div class="col-md-2"> 
            <h3>
                <label for="downloadJsonTrainingProgram" class="btn btn-success">
                    <span class="glyphicon glyphicon-download-alt"></span> Dowload JSON
                </label>
                <input id="downloadJsonTrainingProgram" type="submit" value='downloadJson' class="hidden"/> 
            </h3>
        </div>
    </div>
</div>
<!-- Training Program Details  -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <!-- Default panel contents -->
                <div class="panel-body text-center panel-relative">
                    <h4><?php echo e($trainingprogram->description); ?></h4>
                </div>
                <!-- Table -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-2 text-center">Name</th>
                                    <th class="col-md-2 text-center">Reps</th>
                                    <th class="col-md-2 text-center">Sets</th>
                                    <th class="col-md-2 text-center">Rest</th>
                                    <th class="col-md-2 text-center">Overweight</th>
                                    <th class="col-md-2 text-center">Tools</th>         
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $trainingprogram->exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->name); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->repsMin); ?> - <?php echo e($exercise->repsMax); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->setMin); ?>  - <?php echo e($exercise->setMax); ?></div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->restMin); ?> - <?php echo e($exercise->restMax); ?> </div></td>
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->overweightMin); ?> - <?php echo e($exercise->overweightMax); ?> <?php echo e($exercise->overweightUnit); ?></div></td>     
                                    <td><div style="height:50px; overflow:hidden"><?php echo e($exercise->myToolsToString()); ?></div></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomawock/code/Climb_Training_Laravel/resources/views/trainingprogram/show.blade.php ENDPATH**/ ?>