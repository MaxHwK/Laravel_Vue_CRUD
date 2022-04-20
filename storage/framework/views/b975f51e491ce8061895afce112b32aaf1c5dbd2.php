
 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="mt-5">
                <h4>Here are our different projects ...</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="<?php echo e(route('projects.create')); ?>"> Add <i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
    </div>

    <br>

    <?php if($message = Session::get('success')): ?>
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div class="alert alert-success alert-block">
                <h6><?php echo e($message); ?></h6>
            </div>
        </div>
    <?php endif; ?>
    
    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr class="table-dark align-middle">
                <th>Id</th>
                <th>Number</th>
                <th>Name</th>
                <th>Description</th>
                <th>Technologies</th>
                <th>Client</th>
                <th>Type</th>
                <th>Responsable</th>
                <th>Start Date</th>
                <th>Estimated End Date</th>
                <th>Real End Date</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="w-25">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scope="row"><?php echo e(++$i); ?></td>
                <td><?php echo e($project->numero); ?></td>
                <td><?php echo e($project->nom); ?></td>
                <td><?php echo e($project->description); ?></td>
                <td><?php echo e($project->technologies); ?></td>
                <td><?php echo e($project->client->nom); ?></td>
                <td><?php echo e($project->type->libelle); ?></td>
                <td><?php echo e($project->responsable); ?></td>
                <td><?php echo e(date('d/m/Y', strtotime($project->date_debut))); ?></td>
                <td><?php echo e(date('d/m/Y', strtotime($project->date_fin_estimee))); ?></td>
                <td><?php echo e(date('d/m/Y', strtotime($project->date_fin_reelle))); ?></td>
                <td><?php echo e(date('d/m/Y H:i', strtotime($project->created_at))); ?></td>
                <td><?php echo e(date('d/m/Y H:i', strtotime($project->updated_at))); ?></td>
                <td>
                    <form action="<?php echo e(route('projects.destroy',$project->id)); ?>" method="POST">
    
                        <a class="btn btn-primary mt-1" href="<?php echo e(route('projects.show',$project->id)); ?>">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a class="btn btn-warning mt-1" href="<?php echo e(route('projects.edit',$project->id)); ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
    
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" onclick="return confirm('Do you really want to delete this project ?')" class="btn btn-danger mt-1">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $projects->links(); ?>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('projects.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_only\resources\views/projects/index.blade.php ENDPATH**/ ?>