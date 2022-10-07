


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit Order</h4>
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


      <div class="col-lg-12" id="order_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_order_show')); ?>" method="post" enctype="multipart/form-data" >
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                       
                        
                         <div class="row">
                              <div id="content" class="col-sm-12">
                                 <div class="order_info">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th colspan="3" class="text-left">Dealer Information</th>
                                            <tr>
                                                <td style="width: 33%;" class="text-left">
                                                    <b>Name:</b> <?php echo e($order->getOrderUser->fname); ?>&nbsp;<?php echo e($order->getOrderUser->lname); ?>

                                                </td>
                                                <td style="width: 33%;" class="text-left">
                                                    <b>Email Id:</b> <?php echo e($order->getOrderUser->email); ?>


                                                </td>
                                                <td style="width: 33%;" class="text-left">
                                                    <b>Company Name:</b> <?php echo e($order->getOrderUser->company_name); ?>


                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 33%;" class="text-left">
                                                    <b>Mobile Number:</b> 
                                                    <?php if($order->getOrderUser->country_code): ?>
                                                        +<?php echo e($order->getOrderUser->country_code); ?>

                                                    <?php endif; ?>
                                                    <?php echo e($order->getOrderUser->mobile); ?>


                                                </td>
                                                <td style="width: 33%;" class="text-left">
                                                    <b>Gender:</b>
                                                    <?php if($order->getOrderUser->gender == 'm'): ?>
                                                       Male
                                                    <?php else: ?>
                                                       Female
                                                    <?php endif; ?>

                                                </td>
                                                <td colspan="3" style="width: 100%;" class="text-left">
                                                    <b>Address:</b> <?php echo e($order->getOrderUser->address); ?>

                                                </td>
                                            </tr>
                                           
                                    </table>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th colspan="2" class="text-left">Order Details</th>
                                            <tr>
                                                <td style="width: 50%;" class="text-left">
                                                    <b>Order ID :</b> <?php echo e($order->order_custom_id); ?><br><br>

                                                    <b>Order Date :</b> <?php echo e(date('j F, Y h:i:s A',strtotime($order->created_at))); ?>

                                                </td>
                                                <td style="width: 50%;" class="text-left">
                                                    <b>Payment Method :</b> <?php echo e($order->payment_method); ?>


                                                </td>
                                            </tr>
                                    </table>
                                    <table class="table table-bordered table-hover" width="100%">
                                        <tr>
                                            <th style="width: 50%; vertical-align: top;" class="text-left">Billing Address</th>
                                            <th style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                <?php echo e($order->b_fname); ?>&nbsp;<?php echo e($order->b_lname); ?>

                                                <br />
                                                <?php echo e($order->b_address); ?>

                                                <br /><?php echo e($order->b_state); ?>

                                                <br /><?php echo e($order->b_country); ?>

                                                <br />Pincode : <?php echo e($order->b_pincode); ?>

                                                <br />Phone Number : <?php echo e($order->b_phone); ?>

                                            </td>
                                            <td class="text-left">
                                                <?php echo e($order->s_fname); ?>&nbsp;<?php echo e($order->s_lname); ?>

                                                <br />
                                                <?php echo e($order->s_address); ?>

                                                <br /><?php echo e($order->s_state); ?>

                                                <br /><?php echo e($order->s_country); ?>

                                                <br />Pincode : <?php echo e($order->s_pincode); ?>

                                                <br />Phone Number : <?php echo e($order->s_phone); ?>

                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th class="text-left">Part No.</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Total</th>
                                        </tr>

                                        <?php
                                          if($order->getOrderProducts)
                                          {
                                             foreach($order->getOrderProducts as $product)
                                             {
                                        ?>
                                            <tr>
                                                <td class="text-left"><?php echo e($product->name); ?></td>
                                                <td class="text-left"><?php echo e($product->part_no); ?></td>
                                                <td class="text-right"><?php echo e($product->quantity); ?></td>
                                                <td class="text-right"><?php echo e(siteCurrentcy().$product->price); ?></td>
                                                <td class="text-right"><?php echo e(siteCurrentcy().$product->price*$product->quantity); ?></td>
                                            </tr>
                                        <?php
                                             }
                                          }
                                        ?>


                                        


                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right">
                                                <b>Sub-Total</b>
                                            </td>
                                            <td class="text-right"><?php echo e(siteCurrentcy().$order->order_subtotal); ?></td>
                                        </tr>

                                        <?php if($order->discount_amount > 0): ?>

                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right">
                                                    <b>Discount Amount</b>
                                                </td>
                                                <td class="text-right"><?php echo e(siteCurrentcy().$order->discount_amount); ?></td>
                                            </tr>

                                        <?php endif; ?>
                                        
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right">
                                                <b>Total</b>
                                            </td>
                                            <td class="text-right"><?php echo e(siteCurrentcy().$order->order_total); ?></td>
                                        </tr>
                                    </table>
                                 </div>
                                 <div class="order_info">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th class="text-left">Order Status</th>
                                            <th class="text-left">Status</th>
                                        </tr>
                                        <?php
                                          if($order->getOrderStatus)
                                          {
                                             foreach($order->getOrderStatus as $status)
                                             {
                                       ?>
                                          <tr>
                                            <td class="text-left"><?php echo e(date('j F, Y h:i:s A',strtotime($status->created_at))); ?></td>
                                            <td class="text-left"><?php echo e(ucwords(orderStatus($status->status))); ?></td>
                                        </tr>
                                       <?php
                                             }
                                          }
                                       ?>

                                    </table>
                                 </div>
                                 
                              </div>
                           
                        </div>

                     <?php if(count($order_status) > 0): ?>
                        <div class="row">
                           <div class="col-md-6">

                              <label class="form-label" id="status">Change Status</label>
                              <select class="latest_status form-control wide" name="latest_status" required >

                                 <option value="" <?php if(getFormEditValue($order,'latest_status') == ""): ?> selected <?php endif; ?>>Choose Status</option>

                                 <?php $__currentLoopData = $order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                 <option value="<?php echo e($status); ?>" <?php if(getFormEditValue($order,'latest_status') == "<?php echo e($status); ?>"): ?> selected <?php endif; ?>><?php echo e(ucwords(orderStatus($status))); ?></option>
                                

                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </select>
                              <?php if($errors->has('latest_status')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('latest_status')); ?></p>
                              <?php endif; ?>

                           </div>
                           <div class="col-md-6">

                           </div>
                        </div>
                     <?php endif; ?>

                        <div class="row">
                           <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">&nbsp;</div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <?php if(count($order_status) > 0): ?>
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; 
                              <?php endif; ?>

                                 <a href="<?php echo e(url(route('admin_order_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                           
                           </div>
                     </div>
                     <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
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

      $(".latest_status").select2();
   })

      
   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/order_edit.blade.php ENDPATH**/ ?>