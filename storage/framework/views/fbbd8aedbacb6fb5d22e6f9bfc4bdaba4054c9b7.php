

<?php $__env->startSection('body-content'); ?>

<div class="main-container container">

   <div class="row">
      <form action="<?php echo e(route('user.verification.request')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <?php echo csrf_field(); ?>
         <fieldset id="account">
          <br><br>
            <div class="col-lg-12"> 
                 <?php if(Session::has('success')): ?> 
                     <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
                 <?php endif; ?>
             </div> 
            <div class="clearfix"></div>
            <div class="col-md-12 text-center ">
               <div class="heading_register">
                  <h2 class="title">Verify Email </h2> 
                   <p>Please verify  your email address by clicking the link in  the mail we will send you thanks!</p><br>
                   <img class="login_image" src="<?php echo e(asset('frontend_assets/image/verify-email.png')); ?>">
               </div>
              
               
               <p><button type="submit" class="btn login_btn">Request a New Link </button></p> 
            </div>
            <div class="clearfix"></div>
            <br><br>
   </div>
   </fieldset>
   </form>
</div>
</div>
<br><br>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user-verify-email.blade.php ENDPATH**/ ?>