
  
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="<?php echo e(route('projects.index')); ?>"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>Informations of <?php echo e($project->nom); ?></h4>
        </div>
    </div>
   
    <div class="row justify-content-between">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Number</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->numero); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Name</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->nom); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Technologies</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->technologies); ?></h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-12">
            <h5 class="card-header">Description</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->description); ?></h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Client</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->client ? $project->client->nom : ''); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Type</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->type ? $project->type->libelle : ''); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Responsable</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e($project->responsable); ?></h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Start Date</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e(date('d/m/Y', strtotime($project->date_debut))); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Estimated End Date</h5>
            <div class="card-body">
                <h6 class="card-text"><?php echo e(date('d/m/Y', strtotime($project->date_fin_estimee ))); ?></h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Real End Date</h5>
            <div class="card-body">
                <?php if($project->date_fin_reelle): ?>
                    <h6 class="card-text"><?php echo e(date('d/m/Y', strtotime($project->date_fin_reelle))); ?></h6>
                <?php else: ?>
                    <h6 class="card-text"></h6>
                <?php endif; ?>
            </div>        
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('projects.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_vue\resources\views/projects/show.blade.php ENDPATH**/ ?>