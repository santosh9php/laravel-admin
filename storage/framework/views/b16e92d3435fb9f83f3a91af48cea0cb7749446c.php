


<?php $__env->startSection('body-content'); ?>
    <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;"> Change Password</h4>
            </div>
         </div>
         
      </div>
      <div class="col-lg-12">
         <div class="card">
    
            <div class="card-body">
               <form action="<?php echo e(route('admin_post_changeup')); ?>" method="post">
                <?php echo csrf_field(); ?>
                   <div class="basic-form">
                        <div class="row">
                            <div class="mb-12 col-md-12">
                                <?php if(Session::has('success')): ?>
                                    <p class="text-success"><?php echo Session::get('success'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="row">
                            <div class="mb-12 col-md-12">
                                <?php if(Session::has('error')): ?>
                                    <p class="text-danger"><?php echo Session::get('error'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="row">
                         
                            <div class="mb-3 col-md-3">
                               <label class="form-label">User Name: <b> <?php echo e(auth()->user()->fname." ".auth()->user()->lname); ?></b></label> 
                            </div>

                            <div class="clearfix"></div>

                            <div class="mb-3 col-md-3">
                               <label class="form-label">Old Password</label>
                               <input type="password" class="form-control" name="old_password" required >
                            </div>

                            <div class="mb-3 col-md-3">
                               <label class="form-label">New Password</label>
                               <input type="password" class="form-control" name="new_password" required>
                            </div>


                            <div class="mb-3 col-md-3">
                               <label class="form-label">Confirm Password</label>
                               <input type="password" class="form-control" name="new_password_confirmation" required>
                            </div>

                           
                         </div>
                         <div class="row">
                            <div class="col-md-12">  
                                <?php if($errors->has('old_password')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('old_password')); ?></p>
                                <?php endif; ?>
                                <?php if($errors->has('new_password')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('new_password')); ?></p>
                                <?php endif; ?>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">  
                               <button class="btn btn-primary">Submit</button>
                            </div>
                         </div>
                   </div>
              </form>
            </div>
         </div>
      </div>
  
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/change_password.blade.php ENDPATH**/ ?>