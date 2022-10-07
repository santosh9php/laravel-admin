

<?php $__env->startSection('body-content'); ?>

<br /><br />
<div class="main-container container">
    <div class="row">
        <div class="heading_register">
            <h2 class="title"><?php if($breadcrums): ?><?php echo e($breadcrums); ?><?php endif; ?></h2>
            
        </div>
        <?php if(Session::has('success')): ?>
            <div class="container form-group">
              <div class="main-container" style="text-align: center;">
                 <p class="text-danger mpg_top_error"><?php echo e(Session::get('success')); ?></p>
              </div>
            </div>
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            <div class="container form-group">
              <div class="main-container" style="text-align: center;">
                 <p class="text-danger mpg_top_error"><?php echo e(Session::get('error')); ?></p>
              </div>
            </div>
        <?php endif; ?>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <div class="table-responsive form-group"></div>
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <div class="order_info">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th colspan="2" class="text-left">Order Details</th>
                                <tr>
                                    <td style="width: 50%;" class="text-left">
                                        <b>Order ID :</b> <?php echo e($order->order_custom_id); ?> <br><br>
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
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <?php
                               if($order->getLatestOrderStatus->first())
                               {
                                    if($order->getLatestOrderStatus->first()->status == 1 or $order->getLatestOrderStatus->first()->status == 2 or $order->getLatestOrderStatus->first()->status == 3){
                            ?>
                                    <a href="<?php echo e(route('cancel_order',[$order->id])); ?>" class="btn continue_shopping">Cancel Order</a>&nbsp;
                            <?php
                                    }
                               }
                            ?>
                            
                            <a href="<?php echo e(route('order_history')); ?>" class="btn checkout">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Middle Part End -->
    </div>
</div>
<br /><br />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/order_history_view.blade.php ENDPATH**/ ?>