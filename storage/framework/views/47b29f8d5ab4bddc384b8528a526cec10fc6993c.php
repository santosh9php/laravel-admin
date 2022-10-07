

<?php $__env->startSection('body-content'); ?>
<br><br>
<div class="main-container container">
   <div class="row">
      <form action="<?php echo e(route('user_password_update')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <?php echo csrf_field(); ?>
         <fieldset id="account">
            <div class="col-md-1"></div>
            <div class="col-md-5 "> <br>
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/otp.png')); ?>">
            </div>
            <div class="col-md-5 ">
               <br>
               <div class="heading_register">
                  <h2 class="title">Reset Password</h2>  
                    
               </div>
               <div class="col-lg-12"> 
                 <?php if(Session::has('status')): ?>
                     <p class="alert alert-danger  text-center"><?php echo e(Session::get('status')); ?></p>
                 <?php endif; ?>
               </div> 

              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="form-group">
                  <p class="text-danger mpg_top_error"><?php echo e($message); ?></p>
                </div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

               <label>Password</label> 
               <input type="password" class="form-control" name="password" required >
               <div class="col-lg-12">
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="form-group">
                     <p class="text-danger mpg_input_error"><?php echo e($message); ?></p>
                   </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
               <div class="clearfix"></div>

               <label>Confirm Password</label> 
               <input type="password" class="form-control" name="password_confirmation" required>


               <div class="col-lg-12">
                  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="form-group">
                     <p class="text-danger mpg_input_error"><?php echo e($message); ?></p>
                   </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
               <div class="clearfix"></div>
               
               <input type="hidden" name="token" value="<?php echo e($token); ?>">
               <input type="hidden" name="email" value="<?php echo e(request()->query('email')); ?>">
               

               <p><button class="btn login_btn full_width" type="Continue">Reset Password </button></p> 
            </div>
            <div class="clearfix"></div>
   </div>
   </fieldset>
   </form>
</div>
</div>
<br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_reset_password.blade.php ENDPATH**/ ?>