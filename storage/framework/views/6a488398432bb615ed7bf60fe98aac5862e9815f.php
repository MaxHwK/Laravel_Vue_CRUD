
 
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
   
    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr class="table-dark align-middle">
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>City</th>
                <th>Country</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="w-25">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scope="row"><?php echo e(++$i); ?></td>
                <td><?php echo e($client->nom); ?></td>
                <td><?php echo e($client->adresse); ?></td>
                <td><?php echo e($client->cp); ?></td>
                <td><?php echo e($client->ville); ?></td>
                <td><?php echo e($client->country->libelle); ?></td>
                <td><?php echo e(date('d/m/Y H:i', strtotime($client->created_at))); ?></td>
                <td><?php echo e(date('d/m/Y H:i', strtotime($client->updated_at))); ?></td>
                <td>
                    <form action="<?php echo e(route('clients.destroy',$client->id)); ?>" method="POST">
    
                        <a class="btn btn-primary" href="<?php echo e(route('clients.show',$client->id)); ?>">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a class="btn btn-warning" href="<?php echo e(route('clients.edit',$client->id)); ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
    
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" onclick="return confirm('Do you really want to delete this client ?')" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $clients->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_only\resources\views/clients/index.blade.php ENDPATH**/ ?>