


<?php $__env->startSection('body-content'); ?>

<br><br>
<div class="main-container container">
   <div class="row">
      <form action="<?php echo e(route('user_post_changeup')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <?php echo csrf_field(); ?>
         <fieldset id="account">
            <div class="col-md-7 "> <br>
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/otp.png')); ?>">
            </div>
            <div class="col-md-5 ">
               <div class="heading_register">
                  <h2 class="title">Change Password </h2> 
                  <h2>User Name: <b><?php echo e(auth()->user()->fname." ".auth()->user()->lname); ?></b></h2>
               </div>

               <div class="col-lg-12"> 
                    <?php if(Session::has('success')): ?> 
                        <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                        <p class="alert alert-danger  text-center"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
               </div> 


               <div class="clearfix"></div>

               <label>Old Password</label> 
               <input type="password" class="form-control" name="old_password" value="<?php echo e(old('old_password')); ?>" required >
               <?php if($errors->has('old_password')): ?>
                  <p class="text-danger"><?php echo e($errors->first('old_password')); ?></p>
               <?php endif; ?>
               <div class="clearfix"></div>

               <label>New Password</label> 
               <input type="password" class="form-control" name="new_password" required>

               <?php if($errors->has('new_password')): ?>
                  <p class="text-danger"><?php echo e($errors->first('new_password')); ?></p>
               <?php endif; ?>

               <div class="clearfix"></div>

               <label>Confirm Confirm</label> 
               <input type="password" class="form-control" name="new_password_confirmation" required>

               

               <p><button type="submit" class="btn login_btn" type="Continue">Continue </button></p> 
            </div>
            <div class="clearfix"></div>
   </div>
   </fieldset>
   </form>
</div>
</div>
<br><br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_change_password.blade.php ENDPATH**/ ?>