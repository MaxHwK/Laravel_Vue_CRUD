
  
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="<?php echo e(route('projects.index')); ?>"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>New Project</h4>
        </div>
    </div>
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your fiels !<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="<?php echo e(route('projects.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card border-dark pt-5 ps-5">
            <div class="row align-items-center">
                <div class="col-2 ms-5 ms-5">
                    <label for="inputNumber" class="col-form-label ms-5">Number</label>
                </div>
                <div class="col-2 ms-5 ms-5">
                    <input type="number" name="numero" id="inputNumber" class="form-control ms-5" placeholder="123">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputName" class="col-form-label ms-5">Name</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="nom" id="inputName" class="form-control ms-5" placeholder="Projet de stage">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputTechnologies" class="col-form-label ms-5">Technologies</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="technologies" id="inputTechnologies" class="form-control ms-5" placeholder="Laravel">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputDescription" class="col-form-label ms-5">Description</label>
                </div>
                <div class="col-6 ms-5">
                    <textarea name="description" id="inputDescription" class="form-control ms-5" placeholder="Voici la description du projet de stage"></textarea>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputClientId" class="col-form-label ms-5">Client</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="client_id" id="inputClientId" class="form-control ms-5">
                        <option>Choose a client</option>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>"><?php echo e($client->nom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputTypeId" class="col-form-label ms-5">Type</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="type_id" id="inputTypeId" class="form-control ms-5">
                        <option>Choose a type</option>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->libelle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputResponsable" class="col-form-label ms-5">Responsable</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="responsable" id="inputResponsable" class="form-control ms-5" placeholder="Thomas">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputStartDate" class="col-form-label ms-5">Start Date</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_debut" id="inputStartDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputEstEndDate" class="col-form-label ms-5">Estimated End Date</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_fin_estimee" id="inputEstEndDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputRealEndDate" class="col-form-label ms-5">Real End Date</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_fin_reelle" id="inputRealEndDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary my-4 ms-5">Create</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('projects.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_only\resources\views/projects/create.blade.php ENDPATH**/ ?>