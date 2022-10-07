


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
                              <form action="<?php echo e(route('admin_post_login')); ?>" method="post"> 
                                 <?php echo csrf_field(); ?>
                                 <?php if(Session::has('verified')): ?>
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error"><?php echo Session::get('verified'); ?></p>
                                  <div>
                                  <?php endif; ?>
                                 <?php if(Session::has('login')): ?>
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error"><?php echo Session::get('login'); ?></p>
                                  <div>
                                  <?php endif; ?>
                                  <?php if(Session::has('status')): ?>
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error"><?php echo e(Session::get('status')); ?></p>
                                  <div>
                                  <?php endif; ?>

                                 <div class="form-group">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" class="form-control" placeholder="" name="email" value="<?php echo e($email); ?>" required>
                                 </div>
                                 <?php $__errorArgs = ['email'];
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
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control" placeholder="" name="password" value="<?php echo e($password); ?>" required>
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
                                 <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                       <div class="custom-control custom-checkbox ms-1">
                                          <input type="checkbox" class="form-check-input" id="basic_checkbox_1" name="remember"  value="1" <?php echo e($remember); ?>  >
                                          <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                       </div>
                                    </div>
                                    <?php if(Route::has('admin_forgot_password')): ?>
                                      <div class="form-group">
                                         <a href="<?php echo e(route('admin_forgot_password')); ?>">Forgot Password?</a>
                                      </div>
                                    <?php endif; ?>
                                 </div>
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                 </div>
                              </form>
                               <?php if(Route::has('admin_register')): ?>
                                <div class="new-account mt-3">
                                 
                                </div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/login.blade.php ENDPATH**/ ?>