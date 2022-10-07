<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                   <div class="row">
                        <div class="col-lg-4">
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us-enquiry-delete')): ?>
                             <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_cont_users_show')); ?>">
                                  <label class="form-label">Bulk Delete </label>
                                   <select class=" form-control wide" id="bulk_delete" name="status" >
                                     <option value="">Choose Action</option>
                                     <option value="bulk_delete" >Bulk Delete</option>
                                  </select>
                                  <input type="hidden" name="cont_users_bulk_delete_ids" id="cont_users_bulk_delete_ids" value=""> 
                             </form>
                           <?php endif; ?>
                        </div>
                        <div class="col-lg-4">
                               <form method="GET" action="<?php echo e(route('admin_cont_users_show')); ?>">
                                 <label class="form-label">Search By Email </label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Name" value="<?php echo e(app('request')->input('search_by_name')); ?>" name="search_by_name" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                 </div>
                              </form>
                        </div>
                    </div>                  


                  


               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th class="check">
                                 <input class="form-check-input" type="checkbox" name="cont_all_check" id="cont_all_check" value="all"  > 
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Name</strong></th>
                              <th><strong>Email</strong></th>
                              
                              <th><strong>Spare Part Name</strong></th>
                              <th style="width:280px;"><strong>Date</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="edit_delete"><strong>Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['cont_users_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $cont_userss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont_users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td>
                                    <div class="form-check">
                                          <input class="form-check-input cont_check" type="checkbox" name="cont_users_ids" id="cont_users_ids" value="<?php echo e($cont_users->id); ?>"  >
                                     </div>  
                                 </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('cont_users_counter')); ?>

                                    <?php 
                                       session(['cont_users_counter' => session('cont_users_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($cont_users->name); ?></div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($cont_users->email); ?></div>
                                 </td>
                                 
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($cont_users->part_name); ?></div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e(date('j F, Y h:i:s A',strtotime($cont_users->created_at))); ?></div>
                                 </td>
                                 <td style="text-align:center;">
                                    <a href=""  data-cont_users="<?php echo e($cont_users->id); ?>" data-toggle="modal" data-target="#viewContUsersModal<?php echo e($cont_users->id); ?>"  title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                 </td>
                                 <td style="text-align:center;"> 

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us-enquiry-delete')): ?>
                                    
                                       <a href=""  data-cont_users="<?php echo e($cont_users->id); ?>" data-toggle="modal" data-target="#delete_cont_users" class="btn btn-danger shadow btn-xs sharp cont_users_delete"><i class="fa fa-trash"></i></a>

                                    <?php endif; ?>
                                    
                                 </td>
                              </tr>

                               <?php echo $__env->make('admin.model.view_cont_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($cont_userss->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/cont_users_show.blade.php ENDPATH**/ ?>