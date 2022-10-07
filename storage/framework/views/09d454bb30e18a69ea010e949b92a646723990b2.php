


<?php $__env->startSection('body-content'); ?>


<br><br>
<div class="main-container container">
   <div class="row">
      <form action="<?php echo e(route('user_post_login')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" onsubmit="return check();">
      <?php echo csrf_field(); ?>

         <fieldset id="account">
            <div class="col-md-6 "> 
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/login.png')); ?>">
            </div>
            <div class="col-md-6 ">
               <div class="heading_register">
                  <h2 class="title">Login</h2>
                  <p>SIGN INTO YOUR ACCOUNT</p>
               </div>
               <div class="col-lg-12"> 
                     <?php if(Session::has('verified')): ?> 
                        <p class="alert alert-danger text-center"><?php echo Session::get('verified'); ?></p> 
                     <?php endif; ?>
                     <?php if(Session::has('login')): ?> 
                        <p class="alert alert-danger text-center"><?php echo Session::get('login'); ?></p> 
                     <?php endif; ?>
                     <?php if(Session::has('status')): ?>
                        <p class="alert alert-danger  text-center"><?php echo e(Session::get('status')); ?></p>
                     <?php endif; ?>
                     <?php if(Session::has('success')): ?>
                        <p class="alert alert-success  text-center"><?php echo e(Session::get('success')); ?></p>
                     <?php endif; ?>
               </div> 

               <label>Email Id</label>

               <input type="email" class="form-control" placeholder="" name="email" id="email" value="<?php echo e($email); ?>" >

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

               

               <label>Password</label>

               <input type="password" class="form-control" placeholder="" name="password" value="<?php echo e($password); ?>" required>

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

               <input type="checkbox" class="form-check-input" id="basic_checkbox_1" name="remember"  value="1" <?php echo e($remember); ?>  >

               <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>

               <?php if(Route::has('user_forgot_password')): ?>
                  <p><a href="<?php echo e(route('user_forgot_password')); ?>">Recovery Password</a></p> 

               <?php endif; ?>

               <button type="submit" class="btn login_btn" type="Continue">Continue </button>
            </div>
            <div class="clearfix"></div>
   </div>
   </fieldset>
   </form>
</div>
</div>
<br><br>
      
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>
   <script type="text/javascript">
      function check(){
         if($("#email").val() == '' && $("#mobile").val() == ''){
            alert("Please enter email id or mobile number");
            return false;
         }
      }
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_login.blade.php ENDPATH**/ ?>