

<?php $__env->startSection('body-content'); ?>

<br><br>
<div class="main-container container">
   <div class="row">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <fieldset id="account">
            <div class="col-md-12 text-center"> 
               <img class="login_image" src="<?php echo e(asset('frontend_assets/image/successfull.png')); ?>">
           
               <div class="heading_register">
                  <h2 class="title">your order is complete</h2>
                  <p>you will receiving a confirmation email with order details</p>
               </div>
             
              
                
               <p>  <a href="<?php echo e(route('home')); ?>" style="color:red;">Continue Shopping</a></p> 
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
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/order_complete.blade.php ENDPATH**/ ?>