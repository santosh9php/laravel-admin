<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"> 
                   <div class="row">
                        <!--
                           <div class="col-lg-3">
                                 <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_coupon_show')); ?>">
                                     <label class="form-label">Bulk Delete</label>
                                       <select class="default-select form-control wide" id="bulk_delete" name="status" >
                                         <option value="">Choose Action</option>
                                         <option value="bulk_delete" >Bulk Delete</option>
                                      </select>
                                      <input type="hidden" name="coupon_bulk_delete_ids" id="coupon_bulk_delete_ids" value="">
                                     
                                 </form>
                           </div>
                        -->

                        
                           <div class="col-lg-4">
                               <form method="GET" action="<?php echo e(route('admin_coupon_show')); ?>">
                                 <label class="form-label">Search By Coupon Code</label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon Code" value="<?php echo e(app('request')->input('search_by_coupon_code')); ?>" name="search_by_coupon_code" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                 </div>
                              </form>
                           </div>

                           <div class="col-lg-4">&nbsp;</div>

                           <div class="col-lg-4">
                               <form method="GET" action="<?php echo e(route('admin_coupon_show')); ?>">
                                 <label class="form-label">Filter By Discount Types</label> 
                                    <select class="default-select form-control" id="single-select" name="search_by_discount_type" onchange="this.form.submit()">

                                       <option value="">Select Discount Types</option>

                                       <option value="cart_discount" <?php if(app('request')->input('search_by_discount_type') == 'cart_discount'): ?> selected <?php endif; ?>>Cart Fixed Discount</option>

                                       <option value="cart_per_discount"<?php if(app('request')->input('search_by_discount_type') == 'cart_per_discount'): ?> selected <?php endif; ?>>Cart % Discount</option>
                                       
                                    </select> 
                              </form>
                           </div>
                           
                   </div>







               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th style="text-align:center; width: 60px;"><strong>S No.</strong></th>
                              <th><strong>Discount Type</strong></th>
                              <th style="text-align:center;"><strong>Coupon Amount</strong></th>
                              <th style="text-align:center;"><strong>Coupon Code</strong></th>
                              
                              <th style="text-align:center;"><strong>Start Date</strong></th>
                              <th style="text-align:center;"><strong>Expiry Date</strong></th>
                              <th class="view"><strong>Dealers</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['coupon_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 
                                 <td style="text-align:center;">

                                    <?php echo e(session('coupon_counter')); ?>

                                    <?php 
                                       session(['coupon_counter' => session('coupon_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <?php if($coupon->discount_type == 'cart_discount'): ?>
                                          Cart Fixed Discount
                                       <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                          Cart % Discount
                                       <?php endif; ?>
                                    </div>
                                 </td>

                                 <td style="text-align:center;">
                                    <?php if($coupon->discount_type == 'cart_discount'): ?>
                                       <?php echo e($coupon->coupon_amount); ?>

                                    <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                       <?php echo e($coupon->coupon_amount); ?> %
                                    <?php endif; ?>
                                    
                                 </td>

                                 <td style="text-align:center;">
                                    <?php echo e($coupon->coupon_code); ?>

                                 </td>

                                 

                                 <td style="text-align:center;">
                                    <?php echo e(date('j F, Y',$coupon->coupon_start_date)); ?>

                                 </td>

                                 <td style="text-align:center;">
                                    <?php echo e(date('j F, Y',$coupon->coupon_expiry_date)); ?>

                                 </td>

                                 <td align="center">

                                    <?php
                                       $couponUsers = $coupon->couponUser()->get();

                                       $todays = time();

                                       if(count($couponUsers) == 0 && $coupon->coupon_expiry_date >= $todays && $coupon->status == 'active'){
                                    ?>
                                         <!-- assign  -->
                                         <a href="<?php echo e(route('admin_assign_form_show',[$coupon->id])); ?>" >
                                              <?xml version="1.0" encoding="utf-8"?>
                                             <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                             <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" height="24">
                                             <style type="text/css">
                                                .us0{fill:#FF2D37;}
                                                .us1{fill:#FFFFFF;}
                                             </style>
                                             <path class="us0" d="M21.6,23.6H2.4c-1.1,0-2-0.9-2-2V2.4c0-1.1,0.9-2,2-2h19.2c1.1,0,2,0.9,2,2v19.2C23.6,22.7,22.7,23.6,21.6,23.6
                                                z"/>
                                             <path class="us1" d="M19.2,19.2c0,0.7-0.5,1.2-1.2,1.2H6c-0.7,0-1.2-0.5-1.2-1.2c0-2.4,2.3-4.6,4.7-5.5c-1.4-0.8-2.3-2.3-2.3-4.1
                                                V8.4c0-2.6,2.1-4.8,4.8-4.8s4.8,2.1,4.8,4.8v1.2c0,1.7-0.9,3.2-2.3,4.1C16.9,14.6,19.2,16.8,19.2,19.2z"/>
                                             </svg>
                                          </a>
                                    <?php
                                       } else if(count($couponUsers) == 0 && $coupon->coupon_expiry_date >= $todays && $coupon->status == 'inactive'){

                                       } else {
                                    ?>
                                       
                                        <!-- assign successfull -->
                                          <?xml version="1.0" encoding="utf-8"?>

                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                              viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" height="24">
                                          <style type="text/css">
                                             .st0{fill:#05A500;}
                                             .st1{fill:#FFFFFF;}
                                          </style>
                                          <path class="st0" d="M21.6,23.6H2.4c-1.1,0-2-0.9-2-2V2.4c0-1.1,0.9-2,2-2h19.2c1.1,0,2,0.9,2,2v19.2C23.6,22.7,22.7,23.6,21.6,23.6
                                             z"/>
                                          <path class="st1" d="M9.6,18.9c-0.4,0-0.8-0.2-1.1-0.5l-5.9-5.9C2,11.9,2,11,2.6,10.4c0.6-0.6,1.6-0.6,2.2,0l4.8,4.8l9.6-9.6
                                             c0.6-0.6,1.6-0.6,2.2,0c0.6,0.6,0.6,1.6,0,2.2L10.7,18.5C10.4,18.8,10,18.9,9.6,18.9z"/>
                                          </svg>

                                    <?php
                                       }
                                    ?>
                                 </td>
                                 
                                 <td align="center">
                                    <a href=""  data-coupon="<?php echo e($coupon->id); ?>" data-toggle="modal" data-target="#viewBlogPostModal<?php echo e($coupon->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                     <i class="fa fa-circle text-success me-1"></i> <?php echo e($coupon->status); ?> 
                                 </td>
                                 <td style="text-align:center;"> 
                                       <?php
                                          $couponUsers = $coupon->couponUser()->get();
                                       ?>

                                       <?php if(count($couponUsers) == 0): ?>

                                          <a href="<?php echo e(route('admin_coupon_edit',[$coupon->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

                                       <?php endif; ?>

                                       <?php

                                          $todays = time();

                                          if(count($couponUsers) == 0 or $coupon->coupon_expiry_date < $todays){
                                       ?>
                                             <a href=""  data-coupon="<?php echo e($coupon->id); ?>" data-toggle="modal" data-target="#delete_coupon" class="btn btn-danger shadow btn-xs sharp coupon_delete"><i class="fa fa-trash"></i></a>
                                       <?php
                                          } else {
                                       ?>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <?php
                                          }
                                       ?>

                                      
                                     
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="11">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($coupons->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/coupon_show.blade.php ENDPATH**/ ?>