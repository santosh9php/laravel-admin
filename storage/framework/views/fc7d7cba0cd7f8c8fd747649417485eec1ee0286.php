<div class="modal fade" id="viewBlogPostModal<?php echo e($coupon->id); ?>">
   <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Coupon Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">

                  <?php
                  $users = $coupon->couponUser()->orderBy('fname')->orderBy('lname')->get();
                  if($users && count($users) > 0){
                  ?>

                     <div class="mb-3 col-md-12">
                        <label class="form-label">Assigned Dealers</label>
                        <div style="font-weight:bold;">
                           <div class="clearfix"></div>
                           <div class="div_table"> 
                              <div class="row">
                                 <div class="col-lg-1"><b>S No.</b></div>
                                 <div class="col-lg-3"><b>Name</b></div>
                                 <div class="col-lg-3"><b>Email Id</b></div>
                                 <div class="col-lg-3"><b>Company Name</b></div>
                                 <div class="col-lg-2"><b>Mobile No.</b></div>
                                 <div class="clearfix"></div>
                              </div>
                        <?php
                           $sno =1;
                           foreach($users as $user){
                        ?>
                    

               
                        <div class="clearfix"></div>
                        <style type="text/css">
                           .div_table{ font-weight: 500; margin-bottom: 25px; padding: 0px 15px; background: #f2f2f2; line-height: 25px; font-size: 14px; overflow: hidden; }
                           .div_table .row{ padding: 5px 0; border-bottom:1px solid #e7e0e0; }
                        </style>


                         
                        <div class="row">
                           <div class="col-lg-1"><?php echo e($sno); ?></div>
                           <div class="col-lg-3"><?php echo e($user->fname); ?>&nbsp;<?php echo e($user->lname); ?></div>
                           <div class="col-lg-3"><?php echo e($user->email); ?></div>
                           <div class="col-lg-3"><?php echo e($user->company_name); ?></div>
                           <div class="col-lg-2"><?php echo e($user->mobile); ?></div>
                           <div class="clearfix"></div>
                        </div>

                        <?php
                            $sno++;
                           }
                        ?>

                         </div>
                        </div>
                        
                     </div>


                  <?php } ?>

                 
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Discount Types</label>
                     <div style="font-weight:bold;">
                        <?php if($coupon->discount_type == 'cart_discount'): ?>
                           Cart Fixed Discount
                        <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                           Cart % Discount
                        <?php endif; ?>
                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Coupon Amount</label>
                     <div style="font-weight:bold;">

                        <?php if($coupon->discount_type == 'cart_discount'): ?>
                           <?php echo e($coupon->coupon_amount); ?>

                        <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                           <?php echo e($coupon->coupon_amount); ?> %
                        <?php endif; ?>

                     </div>
                     
                  </div>
                  
                   
                 <div class="mb-3 col-md-4">
                     <label class="form-label">Coupon Code</label>
                     <div style="font-weight:bold;"><?php echo e($coupon->coupon_code); ?></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Coupon Usage Limit</label>
                     <div style="font-weight:bold;"><?php echo e($coupon->coupon_usages_limit); ?></div>
                  </div>
                
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Minimum Purchase Limit</label>
                    <diV style="font-weight:bold;"><?php echo e($coupon->minimum_purchase_limit); ?></div>
                  </div>
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Description</label>
                     <div style="font-weight:bold;"><?php echo e($coupon->description); ?></div>
                  </div>

                  <div class="mb-3 col-md-4">
                     <label class="form-label">Coupon Start Date</label>
                    <diV style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_start_date)); ?></div>
                  </div>
                  <div class="mb-3 col-md-4">
                     <label class="form-label">Coupon Expiry Date</label>
                     <div style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_expiry_date)); ?></div>
                  </div>

                  <div class="mb-3 col-md-4">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;"><?php echo e($coupon->status); ?></div>
                  </div>
               </div>
         </div>
        
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_coupon.blade.php ENDPATH**/ ?>