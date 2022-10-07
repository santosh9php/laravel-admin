

<?php $__env->startSection('body-content'); ?>

<br><br>
<div class="main-container container">
   <div class="row">
         <fieldset id="account">
            <div class="col-md-1"></div>
            <div class="col-md-5 "> <br>
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/otp.png')); ?>">
            </div>
            <div class="col-md-5 ">
               <br>
               <div class="heading_register">
                  <h2 class="title">Forget Password</h2> 
                  <p>Please enter your email id and click the forgot password button</p>
                    
               </div>

               <div class="col-lg-12"> 
                 <?php if(Session::has('status')): ?>
                     <p class="alert alert-danger  text-center"><?php echo e(Session::get('status')); ?></p>
                 <?php endif; ?>
               </div> 
               
               <form action="<?php echo e(route('user_post_forgot_password')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
                <?php echo csrf_field(); ?>

                  <label>Enter Your Email Id</label>
                  <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                  <div class="col-lg-12">
                     <?php $__errorArgs = ['email'];
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
                  <p>
                     <button type="submit" class="btn login_btn full_width" type="Continue">Forget Password </button>
                  </p>
               </form>
                 
                  
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
   </fieldset>
</div>
</div>
<br><br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_forgot_password.blade.php ENDPATH**/ ?>