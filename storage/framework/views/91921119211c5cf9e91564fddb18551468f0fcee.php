
   
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="<?php echo e(route('clients.index')); ?>"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>Edit of <?php echo e($client->nom); ?></h4>
        </div>
    </div>
   
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input !<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
  
    <form action="<?php echo e(route('clients.update',$client->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="card border-dark pt-5 ps-5">
        <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputName" class="col-form-label ms-5">Name</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="nom" value="<?php echo e($client->nom); ?>" id="inputName" class="form-control ms-5" placeholder="Maxence">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputAddress" class="col-form-label ms-5">Address</label>
                </div>
                <div class="col-4 ms-5">
                    <input type="text" name="adresse" value="<?php echo e($client->adresse); ?>" id="inputAddress" class="form-control ms-5" placeholder="3 avenue du Blues">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputPostalCode" class="col-form-label ms-5">Postal Code</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="text" name="cp" value="<?php echo e($client->cp); ?>" id="inputPostalCode" class="form-control ms-5" placeholder="L-4368">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputCity" class="col-form-label ms-5">City</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="ville" value="<?php echo e($client->ville); ?>" id="inputCity" class="form-control ms-5" placeholder="Belval">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputCountryId" class="col-form-label ms-5">Country</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="pays_id" id="inputCountryId" class="form-control ms-5">
                        <option>Choose a country</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                                <?php if($country->id === $client->pays_id): ?> 
                                    selected 
                                <?php endif; ?>
                                value="<?php echo e($country->id); ?>"><?php echo e($country->libelle); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary my-4 ms-5">Update</button>
            </div>
        </div>       
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_only\resources\views/clients/edit.blade.php ENDPATH**/ ?>