


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit Coupon</h4>
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



      <div class="col-lg-12" id="coupon_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_coupon_show')); ?>" method="post" enctype="multipart/form-data" >
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                       
                        
                        <div class="row">

                           

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Discount Types</label>
                              <div style="font-weight:bold;">
                                 <?php if($coupon->discount_type == 'cart_discount'): ?>
                                    Cart Fixed Discount
                                 <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                    Cart % Discount
                                 <?php endif; ?>
                             </div>
                          </div>

                          <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Amount</label>
                              <div style="font-weight:bold;">

                                 <?php if($coupon->discount_type == 'cart_discount'): ?>
                                    <?php echo e($coupon->coupon_amount); ?>

                                 <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                    <?php echo e($coupon->coupon_amount); ?> %
                                 <?php endif; ?>

                              </div>
                              
                           </div>
                        
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Code</label>
                              <div style="font-weight:bold;"><?php echo e($coupon->coupon_code); ?></div>
                              
                           </div>
                           
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Usage Limit</label>
                              <div style="font-weight:bold;"><?php echo e($coupon->coupon_usages_limit); ?></div>
                           </div>
                         
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Minimum Purchase Limit</label>
                             <diV style="font-weight:bold;"><?php echo e($coupon->minimum_purchase_limit); ?></div>
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Description</label>
                              <div style="font-weight:bold;"><?php echo e($coupon->description); ?></div>
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Start Date</label>
                             <diV style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_start_date)); ?></div>
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Coupon Expiry Date</label>
                              <div style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_expiry_date)); ?></div>
                           </div>
                           
                           <div class="mb-3 col-md-6">
                                <label class="form-label" id="status">Status</label>
                                <select class="status  form-control wide" name="status" required >
                                   <option value="" <?php if(getFormEditValue($coupon,'status') == ""): ?> selected <?php endif; ?>>Choose Status</option>
                                   <option value="active" <?php if(getFormEditValue($coupon,'status') == "active"): ?> selected <?php endif; ?>>Active</option>
                                   <option value="inactive" <?php if(getFormEditValue($coupon,'status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                                <?php endif; ?>
                           </div>
                        
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(url(route('admin_coupon_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                        
                        </div>
                     </div>
                     <input type="hidden" name="coupon_id" value="<?php echo e($coupon->id); ?>">
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

      $(document).ready(function(){

         $(".status").select2();
      })
   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/coupon_edit.blade.php ENDPATH**/ ?>