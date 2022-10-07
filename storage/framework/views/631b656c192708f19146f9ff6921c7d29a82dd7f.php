


<?php $__env->startSection('body-content'); ?>


<div class="main-container container">

   

   <div class="row">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <fieldset id="account">
            <div class="profile">
               <div class="col-md-3">
                    <div class="profile_background">
                      <h2 class="dash_heading"> DASHBOARD</h2> 
                        <div class="photo">
                           
                           <?php if($login_user->photo): ?>
                               <img src="<?php echo e(Storage::url($login_user->photo)); ?>" height="150" width="150" >
                           <?php else: ?>
                               <img src="<?php echo e(Storage::url('public/media/image_icon/man.png')); ?>"  height="150" width="150" >
                           <?php endif; ?>

                        </div>
                        <h2 class="title"><?php echo e($login_user->fname." ".$login_user->lname); ?></h2> 
                    </div>
               </div>
               <div class="col-md-9">
                  
                  <div class="details">

                     <div class="col-lg-12"> 
                        <?php if(Session::has('success')): ?> 
                           <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
                        <?php endif; ?>
                        <?php if(Session::has('error')): ?>
                           <p class="alert alert-danger  text-center"><?php echo e(Session::get('error')); ?></p>
                        <?php endif; ?>
                     </div> 


                     <?php if(!is_null($login_user->email) or $login_user->email != ''): ?>
                        <h3> Email Verification: </h3> 
                        <p>
                           <b>Email Id :</b> <?php echo e($login_user->email); ?>  <br>
                           
                        </p>
                        
                        <?php if(is_null($login_user->email_verified_at) or $login_user->email_verified_at == '-0001-11-30 00:00:00'): ?>
                       
                           <p>
                              <b> Verification :</b> Not Done 
                           </p>
                           <p>
                               Please verify your email address by clicking the link in the mail we sent you. If you loss your mail or mail is expired or not working then regenrate the mail.
                           </p>
                           <br>
                           <a class="checkout" href="<?php echo e(route('verification.notice')); ?>">Regenrate Mail</a>

                        <?php else: ?> 
                           <p>
                              <b> Verification :</b> Done 
                           </p>

                        <?php endif; ?>
                        
                        <br>
                     <?php endif; ?>

                     
 
  
                  </div>
               </div>
                <div class="clearfix"></div>
            </div>
         </fieldset>
      </form>
   </div>
</div>
      
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

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_dashboard.blade.php ENDPATH**/ ?>