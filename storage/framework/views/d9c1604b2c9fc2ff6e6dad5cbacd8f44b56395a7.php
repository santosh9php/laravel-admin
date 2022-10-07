


<?php $__env->startSection('body-content'); ?>


<br><br>
<div class="main-container container">
   <?php if(Session::has('success')): ?>
   <div class="row">
      <div class="col-md-12">
         <p class="text-danger mpg_top_error"><?php echo Session::get('success'); ?> Go to <a href="<?php echo e(route('user_dashboard')); ?>">Dashboard</a></p>
       <div>
   </div>      
   <?php endif; ?>
   <div class="row">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <fieldset id="account">
            <div class="col-md-7 "> 
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/otp.png')); ?>">
            </div>
            

            <div class="col-md-5 ">
               <div class="heading_register">
                  <h2 class="title">Enter your OTP </h2>
                  <p>Please enter the OTP sent to <b><?php if(isset($login_user->mobile)): ?>+91 <?php echo e($login_user->mobile); ?> <?php endif; ?></b></p>
               </div>
               <label>Enter the OTP </label> 
               <input type="email" name="email" value="" placeholder="********" id="input-email" class="form-control">
               
               <p><button class="btn login_btn" type="Continue">Continue </button></p><br>
               <p> Not Received your code? <a href="#" style="color:red;">Resend Code</a></p> 
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
     
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_otp.blade.php ENDPATH**/ ?>