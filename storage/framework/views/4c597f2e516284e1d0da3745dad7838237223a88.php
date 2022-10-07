


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add Coupon</h4>
            </div>
         </div>
         
      </div>
      
      <?php if(Session::has('success') || Session::has('error')): ?>

      <div class="row page-titles mx-0 mb-0">
         <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
               
               <?php if(Session::has('success')): ?>
                  <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px;">  
                  <?php echo Session::get('success'); ?>

                  </h4>
               <?php endif; ?>

                  <?php if(Session::has('error')): ?>
                     <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px;">
                     <?php echo Session::get('error'); ?>

                     </h4>
                  <?php endif; ?>
               
            </div>
         </div>
         
      </div>

      <?php endif; ?>

      <div class="col-lg-12" id="bodypart_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_post_coupon_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                           
                           <div class="mb-3 col-md-6">

                              <label class="form-label">Discount Types</label>
                              <select class="discount_type  form-control wide " name="discount_type" required >
                                 <option value="">Choose Discount Types</option>
                                 <option value="cart_discount" <?php if(old('discount_type') == "cart_discount"): ?> selected <?php endif; ?>>Cart Fixed Discount</option>
                                 <option value="cart_per_discount" <?php if(old('discount_type') == "cart_per_discount"): ?> selected <?php endif; ?>>Cart % Discount</option>
                              </select>
                              <?php if($errors->has('discount_type')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('discount_type')); ?></p>
                              <?php endif; ?>

                              
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Amount</label>
                              <input type="number" class="form-control" placeholder="" value="<?php echo e(old('coupon_amount')); ?>" name="coupon_amount" required>
                              <?php if($errors->has('coupon_amount')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('coupon_amount')); ?></p>
                              <?php endif; ?>
                           </div>
                           
                           
                        </div>

                       

                        <div class="row">

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Code</label>
                              <input type="text" class="form-control" placeholder="" value="<?php echo e(old('coupon_code')); ?>" name="coupon_code" maxlength="10" id="coupon_code" required>
                              <?php if($errors->has('coupon_code')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('coupon_code')); ?></p>
                             <?php endif; ?>
                           </div>

                           
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Usage Limit</label>
                              <input type="number" class="form-control" placeholder="" value="<?php echo e(old('coupon_usages_limit')); ?>" name="coupon_usages_limit" required>
                              <?php if($errors->has('coupon_usages_limit')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('coupon_usages_limit')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>

                        <div class="row">
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Minimum Purchase Limit</label>
                              <input type="number" class="form-control" placeholder="" value="<?php echo e(old('minimum_purchase_limit')); ?>" name="minimum_purchase_limit" >
                              <?php if($errors->has('minimum_purchase_limit')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('minimum_purchase_limit')); ?></p>
                              <?php endif; ?>
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Description</label>
                              <textarea class="form-control" name="description" placeholder=""><?php echo e(old('description')); ?></textarea>
                              
                              <?php if($errors->has('description')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
                              <?php endif; ?>
                           </div>



                        </div>

                        <div class="row">

                           <div class="mb-3 col-md-6" id='datetimepicker'>
                              <label class="form-label">Coupon Start Date</label>
                             <input name="coupon_start_date" class="datepicker-default form-control" id="datepicker" value="<?php echo e(old('coupon_start_date')); ?>" required>
                              <?php if($errors->has('coupon_start_date')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('coupon_start_date')); ?></p>
                             <?php endif; ?>
                           </div>

                           
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Expiry Date</label>
                              <input name="coupon_expiry_date" class="datepicker-default form-control" id="coupon_expiry_date" value="<?php echo e(old('coupon_expiry_date')); ?>" required>
                              <?php if($errors->has('coupon_expiry_date')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('coupon_expiry_date')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>


                        <div class="row">
                        
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_coupon_show')); ?>" class="btn btn-danger">Back</a>
                           </div>
                           <div class="col-md-6">
                            
                           </div>
                        </div>
                  </form>   
               </div>
            </div>
         </div>
      </div>
      
   </div>
  </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
   function toTimestamp(strDate){
    var datum = Date.parse(strDate);
    return datum/1000;
   }

   function form_check(coupon){
         var month=0;
         var fullDate = new Date();
         month = parseInt(fullDate.getMonth())+parseInt(1);
         var currentDate = month  + " " +  fullDate.getDate() + "," + fullDate.getFullYear();

         currentDate = toTimestamp(currentDate);

         var coupon_start_date_ts = toTimestamp(coupon.coupon_start_date.value);

         var coupon_expiry_date_ts = toTimestamp(coupon.coupon_expiry_date.value);

         if(coupon.discount_type.value == ''){
            alert("Please select a discount type");
            coupon.discount_type.focus();
            return false;
         } else if(coupon.coupon_amount.value == 0){
            alert("Coupon amount can not be equal to 0.");
            coupon.coupon_amount.focus();
            return false;
         } else if(coupon.discount_type.value == 'cart_per_discount' && coupon.coupon_amount.value > 100){
            alert("Coupon amount can not be greater than 100%.");
            coupon.coupon_amount.focus();
            return false;
         } else if(coupon.coupon_start_date.value == ''){
            alert("Please select a coupon start date");
            coupon.coupon_start_date.focus();
            return false;
         } else if(coupon.coupon_expiry_date.value == ''){
            alert("Please select a coupon end date");
            coupon.coupon_expiry_date.focus();
            return false;
         } else if((coupon_start_date_ts < currentDate)){
            alert("Coupon start date should be greater than or equal to current date");
            coupon.coupon_start_date.focus();
            return false;
         } else if((coupon_expiry_date_ts < currentDate)){
            alert("Coupon end date should be greater than or equal to current date");
            coupon.coupon_expiry_date.focus();
            return false;
         } else if(coupon_start_date_ts > coupon_expiry_date_ts){
            alert("Coupon start date should be less than or equal to coupon end date");
            coupon.coupon_start_date.focus();
            return false;
         } else {
           return true;
         }
   }
   $(document).ready(function(){

      $(".discount_type").select2({});

      $(".status").select2({});

      $('#coupon_code').keyup(function() {
          this.value = this.value.toLocaleUpperCase();
      });

   })
   
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/coupon_add.blade.php ENDPATH**/ ?>