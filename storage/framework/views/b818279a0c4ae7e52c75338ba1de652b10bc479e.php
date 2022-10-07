<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"> 
                   <div class="row">
                           <div class="col-lg-3">
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-delete')): ?>
                                 <form id="bulk_delete_form" method="GET" action="<?php echo e(route('admin_faq_show')); ?>">
                                     <label class="form-label">Bulk Delete</label>
                                       <select class=" form-control wide" id="bulk_delete" name="status" >
                                         <option value="">Choose Action</option>
                                         <option value="bulk_delete" >Bulk Delete</option>
                                      </select>
                                      <input type="hidden" name="faq_bulk_delete_ids" id="faq_bulk_delete_ids" value="">
                                     
                                 </form>
                              <?php endif; ?>
                           </div>
                           <div class="col-lg-3">
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-edit')): ?>
                                 <form id="change_status_form" method="GET" action="<?php echo e(route('admin_faq_show')); ?>">
                                     <label class="form-label">Change Status</label>
                                    
                                       <select class="form-control wide" id="change_status" name="status" >
                                         <option value="">Choose Status</option>
                                         <option value="active" >Inactive To Active</option>
                                         <option value="inactive">Active To Inactive</option>
                                      </select>
                                      <input type="hidden" name="faq_status_ids" id="faq_status_ids" value="">
                                    
                                 </form>
                              <?php endif; ?>
                           </div>
                           <div class="col-lg-3">
                               <form method="GET" action="<?php echo e(route('admin_faq_show')); ?>">
                                 <label class="form-label">Search By Question</label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Question" value="<?php echo e(app('request')->input('search_by_question')); ?>" name="search_by_question" >
                                    <button type="submit" class="btn btn-primary">Search</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-lg-3">
                               <form method="GET" action="<?php echo e(route('admin_faq_show')); ?>">
                                 <label class="form-label">Filter By Category</label> 
                                    <select class="default-select form-control" id="single-select" name="search_by_category" onchange="this.form.submit()">
                                       <option value="">Select Category</option>
                                       <?php if($categories): ?>
                                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php $dash=''; ?>
                                             <option value="<?php echo e($category->id); ?>" <?php if(app('request')->input('search_by_category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option> 
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
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
                              <th class="check">
                                 <input class="form-check-input" type="checkbox" name="faqs_all_check" id="faqs_all_check" value="all"  > 
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th ><strong>Question</strong></th>
                              <th style="text-align:center; width: 200px;"><strong>Category</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="status"><strong>Status</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['faq_counter' => 1]);
                           ?>
                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td>
                                      <div class="form-check">
                                           <input class="form-check-input faqs_check" type="checkbox" name="faq_ids" id="faq_ids" value="<?php echo e($faq->id); ?>"  >
                                       </div>  
                                  </td>
                                 <td style="text-align:center;">

                                    <?php echo e(session('faq_counter')); ?>

                                    <?php 
                                       session(['faq_counter' => session('faq_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($faq->question); ?></div>
                                 </td>

                                 <td style="text-align:center;">
                                    <?php
                                    if($faq->FaqCategory){
                                       $FaqCategory = $faq->FaqCategory;
                                       echo $FaqCategory->name;
                                    }
                                    ?>
                                 </td>
                                 
                                 <td align="center">
                                    <a href=""  data-faq="<?php echo e($faq->id); ?>" data-toggle="modal" data-target="#viewBlogPostModal<?php echo e($faq->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                                 <td style="text-align:center;">
                                     <i class="fa fa-circle text-success me-1"></i> <?php echo e($faq->status); ?> 
                                 </td>
                                 <td style="text-align:center;"> 
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-edit')): ?>
                                       <a href="<?php echo e(route('admin_faq_edit',[$faq->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-delete')): ?>
                                       <a href=""  data-faq="<?php echo e($faq->id); ?>" data-toggle="modal" data-target="#delete_faq" class="btn btn-danger shadow btn-xs sharp faq_delete"><i class="fa fa-trash"></i></a>
                                    <?php endif; ?>
                                     
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($faqs->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/faq_show.blade.php ENDPATH**/ ?>