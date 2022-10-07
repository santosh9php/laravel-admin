

<?php $__env->startSection('body-content'); ?>

<br><br>
<div class="main-container container">
   <div class="col-lg-12"> 
     <?php if(Session::has('success')): ?> 
         <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
     <?php endif; ?>
     <?php if(Session::has('error')): ?>
         <p class="alert alert-danger  text-center"><?php echo e(Session::get('error')); ?></p>
     <?php endif; ?>
  </div>
   
   <div class="row">
      <form action="<?php echo e(route('email_otp_vefify')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">

        <?php echo csrf_field(); ?>

         <fieldset id="account">
            <div class="col-md-7 "> 
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/otp.png')); ?>">
            </div>
            

            <div class="col-md-5 ">
               <div class="heading_register">
                  <h2 class="title">Enter your OTP </h2>
                  <p>Please enter the OTP sent to <b><?php echo e(Auth::user()->email); ?></b></p>
               </div>
               <label>Enter the OTP </label> 
               <input type="text" name="email_otp" value="<?php echo e(old('email_otp')); ?>" placeholder id="input-email" class="form-control" required>

               <?php if($errors->has('email_otp')): ?>
                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('email_otp')); ?></p>
                <?php endif; ?>
               
               <p><button type="submit" class="btn login_btn" type="Continue">Continue </button></p><br>
               <p> Not Received your code? <a href="<?php echo e(route('email_regenerate_otp')); ?>" style="color:red;">Resend Code</a></p> 
            </div>
            <div class="clearfix"></div>

            <input type="hidden" name="order_id" value="<?php echo e($order_id); ?>">
            
   </div>
   </fieldset>
   </form>
</div>
</div>
<br><br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/email_otp_verify.blade.php ENDPATH**/ ?>