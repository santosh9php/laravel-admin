


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles  mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit Blog Category</h4>
            </div>
         </div>
         
      </div>
      
      <?php if(Session::has('success') || Session::has('error')): ?>

      <div class="row page-titles mx-0">
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

      <div class="col-lg-12" id="blog_category_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_blog_category_show')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                       
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Name</label>
                           <input type="text" class="form-control" placeholder="Name" value="<?php echo e(getFormEditValue($blog_category,'name')); ?>" name="name" id="name" required >
                           <?php if($errors->has('name')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                          <?php endif; ?>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Description</label>
                           <textarea type="text" class="form-control" placeholder="Descriptions" name="description" id="description"><?php echo e(getFormEditValue($blog_category,'description')); ?></textarea>
                           <?php if($errors->has('description')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="mb-3 col-md-6">
                           <div class="basic-form custom_file_input">
                              <label class="form-label">Image</label>
                              <div class="input-group">
                                 <div class="form-file" style="padding-top:10px;padding-bottom:10px; border-radius: 0.5rem 0 0 0.5rem;">
                                    <input type="file" name="image" class="form-file-input form-control">
                                 </div>
                                 <span class="input-group-text">Upload</span>
                                 
                              </div>
                              <?php if($blog_category->image): ?>
                                 <img src="<?php echo e(Storage::url($blog_category->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /> 
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Image Attribute</label>
                           <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(getFormEditValue($blog_category,'image_attr')); ?>">
                           <?php if($errors->has('image_attr')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                           <?php endif; ?>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Title</label>
                           <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(getFormEditValue($blog_category,'meta_title')); ?>">
                           <?php if($errors->has('meta_title')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Keywords</label>
                           <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(getFormEditValue($blog_category,'meta_keyword')); ?>">
                           <?php if($errors->has('meta_keyword')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Description</label>
                           <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(getFormEditValue($blog_category,'meta_desc')); ?>">
                           <?php if($errors->has('meta_desc')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label" id="status">Status</label>
                           <select class="default-select  form-control wide" name="status" required >
                              <option value="" <?php if(getFormEditValue($blog_category,'status') == ""): ?> selected <?php endif; ?>>Choose Status</option>
                              <option value="active" <?php if(getFormEditValue($blog_category,'status') == "active"): ?> selected <?php endif; ?>>Active</option>
                              <option value="inactive" <?php if(getFormEditValue($blog_category,'status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                           </select>
                           <?php if($errors->has('status')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(url(route('admin_blog_category_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                     </div>
                     <input type="hidden" name="blog_category_id" value="<?php echo e($blog_category->id); ?>">
                            </div></div></div>
                  </form>   
               </div>
            </div>
         </div>
      </div>
      
   </div>
  </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/blog_category_edit.blade.php ENDPATH**/ ?>