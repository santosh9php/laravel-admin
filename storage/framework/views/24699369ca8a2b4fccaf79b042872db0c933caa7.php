<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"> 
                   <div class="row">
                        
                           <div class="col-lg-3">
                                 <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_order_show')); ?>">
                                     <label class="form-label">Bulk Delete</label>
                                       <select class=" form-control wide" id="bulk_delete" name="status" >
                                         <option value="">Select Action</option>
                                         <option value="bulk_delete" >Bulk Delete</option>
                                      </select>
                                      <input type="hidden" name="order_bulk_delete_ids" id="order_bulk_delete_ids" value="">
                                     
                                 </form>
                           </div>
                       

                        
                           <div class="col-lg-3">
                               <form method="GET" action="<?php echo e(route('admin_order_show')); ?>">
                                 <label class="form-label">Search By Order ID</label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Order ID" value="<?php echo e(app('request')->input('search_by_order_id')); ?>" name="search_by_order_id" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                 </div>
                              </form>
                           </div>
                           


                           <div class="col-lg-3">
                               <form method="GET" action="<?php echo e(route('admin_order_show')); ?>">
                                 <label class="form-label">Filter By Dealer</label> 
                                    <select class=" form-control" id="single-select" name="search_by_dealer" onchange="this.form.submit()">

                                       <option value="">Select Dealer</option>

                                       <?php if($users): ?>
                                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($user->id); ?>" <?php if(app('request')->input('search_by_dealer') == $user->id): ?> selected <?php endif; ?>><?php echo e($user->fname); ?>&nbsp;<?php echo e($user->lname); ?></option>
                                            
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                       
                                    </select> 

                                    <input type="hidden" name="filter_by_status" value="<?php echo e(app('request')->input('filter_by_status')); ?>" >

                              </form>
                           </div>

                           <div class="col-lg-3">
                              <form  method="GET" action="<?php echo e(route('admin_order_show')); ?>">
                                  <label class="form-label">Filter By Status</label>
                                 
                                    <select class=" form-control wide" id="filter_by_status" name="filter_by_status" onchange="this.form.submit()" >
                                      <option value="">Select Status</option>

                                       <option value="pending" <?php if(app('request')->input('filter_by_status') == 'pending'): ?> selected <?php endif; ?> >Pending</option>

                                       <option value="completed" <?php if(app('request')->input('filter_by_status') == 'completed'): ?> selected <?php endif; ?> >Completed</option>

                                       <option value="processing" <?php if(app('request')->input('filter_by_status') == 'processing'): ?> selected <?php endif; ?> >Processing</option>

                                       <option value="cancelled" <?php if(app('request')->input('filter_by_status') == 'cancelled'): ?> selected <?php endif; ?> >Cancelled</option>

                                       <option value="shipped" <?php if(app('request')->input('filter_by_status') == 'shipped'): ?> selected <?php endif; ?> >Shipped</option>

                                       <option value="delivered" <?php if(app('request')->input('filter_by_status') == 'delivered'): ?> selected <?php endif; ?> >Delivered</option>

                                       <option value="returned" <?php if(app('request')->input('filter_by_status') == 'returned'): ?> selected <?php endif; ?> >Returned</option>
                                      
                                   </select>

                                   <input type="hidden" name="search_by_dealer" value="<?php echo e(app('request')->input('search_by_dealer')); ?>" >

                                   

                              </form>
                           </div>
                           
                   </div>







               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th style="text-align:center; width: 60px;">
                                 <input class="form-check-input" type="checkbox" name="orders_all_check" id="orders_all_check" value="all"  > 
                              </th>
                              <th style="text-align:center; width: 60px;"><strong>S No.</strong></th>
                              <th style="text-align:center;"><strong>Order ID</strong></th>
                              <th style="text-align:center;"><strong>Dealer Name</strong></th>
                              <th style="text-align:center;"><strong>Order Date</strong></th>
                              <th style="text-align:center;"><strong>Sub Total</strong></th>
                              <th style="text-align:center;"><strong>Discount</strong></th>
                              <th class="view"><strong>Total</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['order_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td>
                                      <div class="form-check">
                                           <input class="form-check-input orders_check" type="checkbox" name="order_ids" id="order_ids" value="<?php echo e($order->id); ?>"  >
                                       </div>  
                                  </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('order_counter')); ?>

                                    <?php 
                                       session(['order_counter' => session('order_counter')+1]);
                                    ?>
                                 </td>

                                 <td style="text-align:center;">
                                    <?php echo e($order->order_custom_id); ?>

                                 </td>

                                 <td style="text-align:center;">
                                   <?php echo e($order->getOrderUser->fname); ?>&nbsp;<?php echo e($order->getOrderUser->lname); ?>

                                    
                                 </td>



                                 <td style="text-align:center;">
                                    <?php echo e(date('j F, Y h:i:s A',strtotime($order->created_at))); ?>

                                 </td>

                                 

                                 <td style="text-align:center;">
                                    <?php echo e($order->order_subtotal); ?>

                                 </td>

                                 <td style="text-align:center;">
                                    <?php echo e($order->discount_amount); ?>

                                 </td>

                                 <td align="center">

                                    <?php echo e($order->order_total); ?>

                                 </td>
                                 
                                 <td align="center">
                                    <a href=""  data-order="<?php echo e($order->id); ?>" data-toggle="modal" data-target="#viewBlogPostModal<?php echo e($order->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                     <?php echo e(ucwords(orderStatus($order->latest_status))); ?>

                                 </td>
                                 <td style="text-align:center;"> 

                                    <a href="<?php echo e(route('admin_order_edit',[$order->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

                                    <a href=""  data-order="<?php echo e($order->id); ?>" data-toggle="modal" data-target="#delete_order" class="btn btn-danger shadow btn-xs sharp order_delete"><i class="fa fa-trash"></i></a>
                                     
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="11">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($orders->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/order_show.blade.php ENDPATH**/ ?>