

<?php $__env->startSection('body-content'); ?>

<br><br>
   <div class="main-container container"> 
      <div class="row">
         <!--Middle Part Start-->
         <div id="content" class="col-sm-12">
             <div class="heading_register">
                  <h2 class="title"><?php if($breadcrums): ?><?php echo e($breadcrums); ?><?php endif; ?></h2>
               </div>
             
               
            <div class="order_history">
               <table width="100%">
                  
                     <tr>
                        <th data-td="S. No" class="text-center">S. No</th>
                        <th data-td="Order ID" class="text-center">Order ID</th>
                        <th data-td="Order ID" class="text-center">First Name</th>
                        <th data-td="Order ID" class="text-center">Last name</th>
                        <th data-td="Date Added" class="text-center">Order Date</th>
                        <th data-td="Total" class="text-right">Sub Total</th>
                        <th data-td="Total" class="text-right">Discount</th>
                        <th data-td="Total" class="text-right">Total</th>
                        <th data-td="Status" class="text-center">Status</th>
                        <th data-td="View"></th>
                     </tr>

               <?php if($orders): ?>

                  <?php $count=1; ?>

                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                     <tr>
                        <td data-td="1" class="text-center"><?php echo e($count); ?></td>
                        <td data-td="Product Name" class="text-left"><?php echo e($order->order_custom_id); ?></td>
                        <td data-td="Product Name" class="text-left"><?php echo e($order->b_fname); ?></td>
                        <td data-td="Product Name" class="text-left"><?php echo e($order->b_lname); ?></td>
                        <td data-td="Order ID" class="text-center"><?php echo e(date('j F, Y h:i:s A',strtotime($order->created_at))); ?></td>
                        <td data-td="Qty" class="text-center"><?php echo e($order->order_subtotal); ?></td>
                        <td data-td="Status" class="text-center"><?php echo e($order->discount_amount); ?></td>
                        <td data-td="Date Added" class="text-center"><?php echo e($order->order_total); ?></td>
                        <td data-td="Total" class="text-right"><?php echo e(ucwords(orderStatus($order->latest_status))); ?></td>
                        <td data-td="View" class="text-center"><a class="btn btn-danger" title="" href="<?php echo e(route('order_history_view',[$order->id])); ?>"><i class="fa fa-eye"></i></a></td>
                     </tr>

                     <?php $count++; ?>


                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               <?php endif; ?>
                    
                  </tbody>
               </table>
               <?php if(count($orders) > 0 ): ?>
                  <div class="product-filter product-filter-bottom filters-panel">
                     <div class="row">
                        <div class="col-sm-12 text-center"><?php echo e($orders->links()); ?></div>
                     </div>
                  </div>
               <?php endif; ?>
            </div>

         </div>
 
         <!--Right Part End -->
      </div>
   </div>
<br><br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/order_history.blade.php ENDPATH**/ ?>