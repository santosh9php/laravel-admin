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
                          <form id="change_status_form" method="GET" action="<?php echo e(route('admin_brand_show')); ?>">
                             <label class="form-label">Change Status</label>
                             <div>
                                <select class=" form-control wide" id="change_status" name="status" >
                                  <option value="">Choose Status</option>
                                  <option value="active" >Inactive To Active</option>
                                  <option value="inactive">Active To Inactive</option>
                               </select>
                               <input type="hidden" name="brand_status_ids" id="brand_status_ids" value="">
                             </div>
                          </form>
                   </div>

                    

                   <div class="col-lg-3">
                           <form method="GET" action="<?php echo e(route('admin_brand_show')); ?>">
                             <label class="form-label">Search By Segment Name</label>
                             <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Name" value="<?php echo e(app('request')->input('search_by_name')); ?>" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                   </div>

                  <div class="col-lg-3">
                     <form method="GET" action="<?php echo e(route('admin_brand_show')); ?>">
                           <label class="form-label">Show By Vehicle Type</label>
                           <div>
                              <select class="default-select form-control" id="single-select" name="search_brand_by_veh_type" onchange="this.form.submit()">
                                 <option value="">Select Vehicle Type</option>
                                 <?php if($brand_categories): ?>
                                    <?php $__currentLoopData = $brand_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php $dash=''; ?>
                                       <option value="<?php echo e($category->id); ?>" <?php if(app('request')->input('search_brand_by_veh_type') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                           </div>
                     </form>
                  </div>

                   <div class="col-lg-3">
                      <form method="GET" action="<?php echo e(route('admin_brand_show')); ?>">
                          <label class="form-label">Show Sub Segments</label>
                         <div>
                            <select class=" form-control" id="select_brand" name="search_brand" onchange="this.form.submit()">
                               <option value="">Select Segment</option>
                               <?php if($brands): ?>
                                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php $dash=''; ?>
                                     <option value="<?php echo e($brand->id); ?>" <?php if(app('request')->input('search_brand') == $brand->id): ?> selected <?php endif; ?>><?php echo e($brand->name); ?></option>
                                     <?php if(count($brand->subBrand)): ?>
                                        <?php echo $__env->make('admin.subBrand.subBrand_search',['subbrands' => $brand->subBrand], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endif; ?>
                            </select>
                            <input type="hidden" name="search_brand_by_veh_type" value="<?php echo e(app('request')->input('search_brand_by_veh_type')); ?>" >
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
                                 <input class="form-check-input" type="checkbox" name="brand_all_check" id="brand_all_check" value="all"  > 

                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th class="category"><strong>Vehicle Types</strong></th>
                              <th class="category"><strong>Segment</strong></th>
                              <th class="subcategory"><strong>Sub Segment</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['brand_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $brands_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $dash=''; ?>
                              <tr>
                                 <td>

                                  <div class="form-check">
                                         <input class="form-check-input brand_check" type="checkbox" name="brand_ids" id="brand_ids" value="<?php echo e($brand->id); ?>"  >
                                    </div>  
                                 </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('brand_counter')); ?>

                                    <?php 
                                       session(['brand_counter' => session('brand_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($brand->category->name); ?></div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($brand->name); ?></div>
                                 </td>
                                 <td>&nbsp;</td>
                                 
                                 <td style="text-align:center;">
                                    <a href=""  data-brand="<?php echo e($brand->id); ?>" data-toggle="modal" data-target="#viewBrandModal<?php echo e($brand->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                    <i class="fa fa-circle text-success me-1"></i> <?php echo e($brand->status); ?> 
                                 </td>
                                 <td style="text-align:center;">
                                   
                                       <a href="<?php echo e(route('admin_brand_edit',[$brand->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                       
                                       <a href=""  data-brand="<?php echo e($brand->id); ?>" data-toggle="modal" data-target="#delete_brand" class="btn btn-danger shadow btn-xs sharp brand_delete"><i class="fa fa-trash"></i></a>
                                       
                                   
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                              

                              <?php if(count($brand->subbrand)): ?>
                                 <?php echo $__env->make('admin.subBrand.subBrand_show',['subbrands' => $brand->subbrand,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              <?php endif; ?>
                              

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="9">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($brands_list->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/brand_show.blade.php ENDPATH**/ ?>