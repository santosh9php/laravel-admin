


<?php $__env->startSection('body-content'); ?>
    <div class="authincation h-100">
         <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-6">
                  <div class="authincation-content">
                     <div class="row no-gutters">
                        <div class="col-xl-12">
                           <div class="auth-form">
                              <div class="text-center mb-3">
                                <img src="<?php echo e(asset('admin_assets/images/logo-full-black.png')); ?>" alt="">
                              </div>
                              <br>
                              <h3 class="text-center mb-4">Reset Password</h3>
                              <form method="POST" action="<?php echo e(route('admin_password_update')); ?>" >
                               <?php echo csrf_field(); ?>
                                <?php if(Session::has('status')): ?>
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error"><?php echo e(Session::get('status')); ?></p>
                                  <div>
                                <?php endif; ?>
                                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error"><?php echo e($message); ?></p>
                                  <div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                <input type="hidden" name="email" value="<?php echo e(request()->query('email')); ?>">
                                
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password" required >
                                 </div>
                                 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error"><?php echo e($message); ?></p>
                                  <div>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Confirm Password</strong></label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                 </div>
                                 <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error"><?php echo e($message); ?></p>
                                  <div>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/reset_password.blade.php ENDPATH**/ ?>