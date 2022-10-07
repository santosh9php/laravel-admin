<div class="card" id="blog_category_add_model" >
   <div class="card-header">
      <h4 class="card-title">Add Blog Category</h4>
      <!--   <div class="float-left"></div>
         <div class="float-right text-right">asdfsad</div>
         <div class="clearfix"></div> -->
   </div>

   <div class="card-body" >
      <form action="<?php echo e(route('admin_post_blog_category_show')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
         <div class="basic-form">
         <div class="row">
            
            <div class="mb-3 col-md-3">
               <label class="form-label">Name</label>
               <input type="text" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>" name="name" required>
               <?php if($errors->has('name')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
              <?php endif; ?>
            </div>
            
            <div class="mb-3 col-md-3">
               <label class="form-label">Description</label>
               <textarea type="text" class="form-control" placeholder="Descriptions" name="description"><?php echo e(old('description')); ?></textarea>
               <?php if($errors->has('description')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
              <?php endif; ?>
            </div>
            
            <div class="mb-3 col-md-3">
               <div class="basic-form custom_file_input">
                  <label class="form-label">Image</label>
                  <div class="input-group">
                     <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                        <input type="file" class="form-file-input form-control" name="image" >
                        <?php if($errors->has('image')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('image')); ?></p>
                       <?php endif; ?>
                     </div>
                     <span class="input-group-text">Upload</span>
                  </div>
               </div>
            </div>

            <div class="mb-3 col-md-3">
               <label class="form-label">Image Attribute</label>
               <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(old('image_attr')); ?>">
               <?php if($errors->has('image_attr')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
              <?php endif; ?>
            </div>

          </div>
          <div class="row">
            
            
            <div class="mb-3 col-md-3">
               <label class="form-label">Meta Title</label>
               <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
               <?php if($errors->has('meta_title')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
              <?php endif; ?>
            </div>
            <div class="mb-3 col-md-3">
               <label class="form-label">Meta Keywords</label>
               <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(old('meta_keyword')); ?>">
               <?php if($errors->has('meta_keyword')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
              <?php endif; ?>
            </div>

            <div class="mb-3 col-md-3">
               <label class="form-label">Meta Description</label>
               <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(old('meta_desc')); ?>">
               <?php if($errors->has('meta_desc')): ?>
                <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
              <?php endif; ?>
            </div>

            <div class="mb-3 col-md-3">
                 <label class="form-label">Status</label>
                 <select class="status  form-control wide" name="status" required>
                    <option value="">Choose Status</option>
                    <option value="active" <?php if(old('status') == "active" || old('status') == ""): ?> selected <?php endif; ?>>Active</option>
                    <option value="inactive" <?php if(old('status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                 </select>
                 <?php if($errors->has('status')): ?>
                   <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                 <?php endif; ?>
            </div>

            </div>
            



          <div class="row">
            <div class="col-md-6">
               <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="#" class="btn btn-danger" id="blog_category_hide_form">Hide Form</a>
              
              
            </div>
         </div>

         </div>
      </form>
   </div>

</div>

<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/blog_category_add.blade.php ENDPATH**/ ?>