
 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="mt-5">
                <h4>Here are our different clients ...</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="<?php echo e(route('clients.create')); ?>"> Add <i class="bi bi-plus-circle"></i></a>
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
   
    <client-table-component
        :rows='<?php echo json_encode($clients, 15, 512) ?>'
        concept="client">
    </client-table-component>       
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_vue\resources\views/clients/index.blade.php ENDPATH**/ ?>