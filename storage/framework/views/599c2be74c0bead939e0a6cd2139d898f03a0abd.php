<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"> 
                  <!--
                     <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_category_show')); ?>">
                        <div>Bulk Delete</div>
                        <div class="input-group search-area right d-lg-inline-flex d-none">
                           <select class="form-control wide" id="bulk_delete" name="status" >
                             <option value="">Choose Action</option>
                             <option value="bulk_delete" >Bulk Delete</option>
                          </select>
                          <input type="hidden" name="category_bulk_delete_ids" id="category_bulk_delete_ids" value="">
                        </div>
                     </form>
                  -->

                <div class="row">
                   <div class="col-lg-3">
                      <form id="change_status_form" method="GET" action="<?php echo e(route('admin_bodypart_show')); ?>">
                         <label class="form-label">Change Status</label> 
                         <div>
                            <select class=" form-control wide" id="change_status" name="status" >
                              <option value="">Choose Status</option>
                              <option value="active" >Inactive To Active</option>
                              <option value="inactive">Active To Inactive</option>
                           </select>
                           <input type="hidden" name="bodypart_status_ids" id="bodypart_status_ids" value="">
                         </div>
                      </form>
                   </div>
                   <div class="col-lg-3">
                       <form method="GET" action="<?php echo e(route('admin_bodypart_show')); ?>">
                         <label class="form-label">Search By Body Parts Name</label> 
                         <div class="input-group">
                            <input type="text" class="form-control" placeholder="Name" value="<?php echo e(app('request')->input('search_by_name')); ?>" name="search_by_name" >
                            <button type="submit" class="btn btn-primary">Search</button>
                         </div>
                      </form>
                   </div>
                   <div class="col-lg-3">
                     <form method="GET" action="<?php echo e(route('admin_bodypart_show')); ?>">
                           <label class="form-label">Show By Vehicle Types</label>
                           <div>
                              <select class=" form-control" id="single-select" name="search_bodypart_by_veh_type" onchange="this.form.submit()">
                                 <option value="">Select Vehicle Types</option>
                                 <?php if($bodypart_categories): ?>
                                    <?php $__currentLoopData = $bodypart_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php $dash=''; ?>
                                       <option value="<?php echo e($category->id); ?>" <?php if(app('request')->input('search_bodypart_by_veh_type') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                           </div>
                     </form>
                   </div>
                   <div class="col-lg-3">
                      <form method="GET" action="<?php echo e(route('admin_bodypart_show')); ?>">
                         <label class="form-label">Show Sub Body Parts</label> 
                         <div class="input-group">
                            <select class=" form-control" id="select_bodypart" name="search_bodypart" onchange="this.form.submit()">
                               <option value="">Select Body Part</option>
                               <?php if($bodyparts): ?>
                                  <?php $__currentLoopData = $bodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php $dash=''; ?>
                                     <option value="<?php echo e($bodypart->id); ?>" <?php if(app('request')->input('search_bodypart') == $bodypart->id): ?> selected <?php endif; ?>><?php echo e($bodypart->name); ?></option>
                                     <?php if(count($bodypart->subBodypart)): ?>
                                        <?php echo $__env->make('admin.subBodyPart.subBodyPart_search',['subbodyparts' => $bodypart->subBodypart], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endif; ?>
                            </select>
                            <input type="hidden" name="search_bodypart_by_veh_type" value="<?php echo e(app('request')->input('search_bodypart_by_veh_type')); ?>" >
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
                                 <input class="form-check-input" type="checkbox" name="bodypart_all_check" id="bodypart_all_check" value="all"  > 

                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th class="category"><strong>Vehicle Types</strong></th>
                              <th class="category"><strong>Body Part</strong></th>
                              <th class="subcategory"><strong>Sub Body Part</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['bodypart_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $bodyparts_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $dash=''; ?>
                              <tr>
                                 <td>
                                   <div class="form-check">
                                         <input class="form-check-input bodypart_check" type="checkbox" name="bodypart_ids" id="bodypart_ids" value="<?php echo e($bodypart->id); ?>"  >           
                                   </div> 
                                 </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('bodypart_counter')); ?>

                                    <?php 
                                       session(['bodypart_counter' => session('bodypart_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($bodypart->category->name); ?></div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($bodypart->name); ?></div>
                                 </td>
                                 
                                 <td>&nbsp;</td>
                                 
                                 <td align="center">
                                    <a href=""  data-bodypart="<?php echo e($bodypart->id); ?>" data-toggle="modal" data-target="#viewBodypartModal<?php echo e($bodypart->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                     <i class="fa fa-circle text-success me-1"></i> <?php echo e($bodypart->status); ?> 
                                 </td>
                                 <td style="text-align:center;"> 
                                       <a href="<?php echo e(route('admin_bodypart_edit',[$bodypart->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                       
                                       <a href=""  data-bodypart="<?php echo e($bodypart->id); ?>" data-toggle="modal" data-target="#delete_bodypart" class="btn btn-danger shadow btn-xs sharp bodypart_delete"><i class="fa fa-trash"></i></a>
                                    
                                    
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_bodypart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                              

                              <?php if(count($bodypart->subbodypart)): ?>
                                  <?php echo $__env->make('admin.subBodyPart.subBodyPart_show',['subbodyparts' => $bodypart->subbodypart,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              <?php endif; ?>
                              

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="9">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($bodyparts_list->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/bodypart_show.blade.php ENDPATH**/ ?>