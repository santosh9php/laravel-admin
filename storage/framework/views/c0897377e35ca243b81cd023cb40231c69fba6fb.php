<div class="modal fade" id="viewBlogPostModal<?php echo e($order->id); ?>">
   <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Order Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

            <div class="order_informaction">
               <div class="title">Dealer Information</div>
               <div class="border_bottom row m-0">
                  <div class="col-lg-4 pt-15  pb-15">
                     <b>Name:</b> <?php echo e($order->getOrderUser->fname); ?>&nbsp;<?php echo e($order->getOrderUser->lname); ?>

                  </div>
                  <div class="col-lg-4 pt-15  pb-15">
                     <b>Email Id:</b> <?php echo e($order->getOrderUser->email); ?>

                  </div>
                  <div class="col-lg-4 pt-15  pb-15">
                     <b>Company Name:</b> <?php echo e($order->getOrderUser->company_name); ?>

                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="border_bottom row m-0">
                  <div class="col-lg-4 pt-15  pb-15">
                     <b>Mobile Number:</b> 
                     <?php if($order->getOrderUser->country_code): ?>
                        +<?php echo e($order->getOrderUser->country_code); ?>

                     <?php endif; ?>
                     <?php echo e($order->getOrderUser->mobile); ?>

                  </div>
                  <div class="col-lg-4 pt-15  pb-15">
                     <b>Gender:</b>
                     <?php if($order->getOrderUser->gender == 'm'): ?>
                     Male
                     <?php else: ?>
                     Female
                     <?php endif; ?>
                  </div>
                  <div class="col-lg-4 pt-15  pb-15">
                    <b>Address:</b> <?php echo e($order->getOrderUser->address); ?>

                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <br>


            <div class="order_informaction">   
               <div class="title">Order Details</div>
               <div class="border_bottom">
                  <div class="float-start pt-15  pb-15 pl-15">
                    <b>Order ID:</b> <?php echo e($order->order_custom_id); ?> <br>
                    <b>Order Date:</b> <?php echo e(date('j F, Y h:i:s A',strtotime($order->created_at))); ?>

                  </div>
                  <div class="float-end pt-15  pb-15 pr-15">
                     <b>Payment Method:</b> <?php echo e($order->payment_method); ?>

                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="float-start pt-15  pb-15 pl-15">
                  <b>Billing Address</b><br />
                  <?php echo e($order->b_fname); ?>&nbsp;<?php echo e($order->b_lname); ?>

                  <br />
                  <?php echo e($order->b_address); ?>

                  <br /><?php echo e($order->b_state); ?>

                  <br /><?php echo e($order->b_country); ?>

                  <br />Pincode : <?php echo e($order->b_pincode); ?>

                  <br />Phone Number : <?php echo e($order->b_phone); ?>

               </div>
               <div class="float-end pt-15  pb-15 pr-15">
                  <b>Shipping Address</b><br />
                  <?php echo e($order->s_fname); ?>&nbsp;<?php echo e($order->s_lname); ?>

                  <br />
                  <?php echo e($order->s_address); ?>

                  <br /><?php echo e($order->s_state); ?>

                  <br /><?php echo e($order->s_country); ?>

                  <br />Pincode : <?php echo e($order->s_pincode); ?>

                  <br />Phone Number : <?php echo e($order->s_phone); ?>

               </div>
               <div class="clearfix"></div>
            </div>
            <br>

            <div class="order_informaction"> 

               <div class="row m-0">
                  <div class="col-sm-4 title ">Product Name</div>
                  <div class="col-sm-2 title border_left">Part No.</div>
                  <div class="col-sm-2 title border_left">Quantity</div>
                  <div class="col-sm-2 title border_left">Price</div>
                  <div class="col-sm-2 title border_left ">Total</div>
                  <div class="clearfix"></div>
                  <?php
                  if($order->getOrderProducts)
                  {
                  foreach($order->getOrderProducts as $product)
                  {
                  ?>
                  <div class="col-sm-4 pt-10 pb-10 border_top "><?php echo e($product->name); ?></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><?php echo e($product->part_no); ?></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><?php echo e($product->quantity); ?></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><?php echo e(siteCurrentcy().$product->price); ?></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left text-right"><?php echo e(siteCurrentcy().$product->price*$product->quantity); ?></div>
                  <div class="clearfix"></div>
                  <?php
                  }
                  }
                  ?>
                  <div class="col-sm-8 pt-10 pb-10 border_top ">&nbsp;</div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"> <b>Sub-Total</b></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><?php echo e(siteCurrentcy().$order->order_subtotal); ?></div>
                  <div class="clearfix"></div>
                  <?php if($order->discount_amount > 0): ?>  
                  <div class="col-sm-8 pt-10 pb-10 border_top ">&nbsp;</div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><b>Discount Amount</b></div>
                  <div class="col-sm-2 pt-10 pb-10 border_top border_left"><?php echo e(siteCurrentcy().$order->discount_amount); ?></div>
                  <div class="clearfix"></div>
                  <?php endif; ?> 
                  <div class="col-sm-8 pt-10 pb-10  border_top ">&nbsp;</div>
                  <div class="col-sm-2 pt-10 pb-10  border_top border_left"><b>Total</b></div>
                  <div class="col-sm-2 pt-10 pb-10  border_top border_left"><?php echo e(siteCurrentcy().$order->order_total); ?>

                  </div>
                  <div class="clearfix"></div>
               
                 
               </div>
            </div>

            <br />

            <div class="order_informaction"> 

                     <div class="border_bottom">
                        <div class="float-start pt-15  pb-15 pl-15">
                           <b>Order Status</b><br /> 
                        </div>
                        <div class="float-end pt-15  pb-15 pr-15">
                           <b>Status</b><br />  
                        </div>
                        <div class="clearfix"></div>
                     </div>

                      <?php
                        if($order->getOrderStatus)
                        {
                           foreach($order->getOrderStatus as $status)
                           {
                           ?>
                           <div class="border_bottom">
                              <div class="float-start pt-15  pb-15 pl-15">
                                  <?php echo e(date('j F, Y h:i:s A',strtotime($status->created_at))); ?>

                              </div>
                              <div class="float-end pt-15  pb-15 pr-15">
                                  <?php echo e(ucwords(orderStatus($status->status))); ?>

                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <?php
                           }
                        }
                        ?>

            </div>

         </div>
        
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_order.blade.php ENDPATH**/ ?>