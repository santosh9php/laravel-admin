


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
                                 <h1>Verify email</h1>

                                 <p>Please verify your email address by clicking the link in the mail we sent you. Thanks!</p>
                                 
                                 <form action="<?php echo e(route('verification.request')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                     <button type="submit">Request a new link</button>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/verify-email.blade.php ENDPATH**/ ?>