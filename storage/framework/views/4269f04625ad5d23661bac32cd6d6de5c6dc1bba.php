


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles  mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add Blog Post</h4>
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

      <div class="col-lg-12" id="bodypart_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_post_blog_post_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                           
                           <div class="mb-3 col-md-4">
                              <label class="form-label">Category</label>
                              <select class="category_id  form-control wide show_category_subc" name="category_id" required>
                                  <option value="" <?php if(old('category_id') == ""): ?> selected <?php endif; ?>>Select Category</option>
                                    <?php if($categories): ?>
                                       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php $dash=''; ?>
                                          <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                         
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                              </select>
                              <?php if($errors->has('parent_id')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('parent_id')); ?></p>
                             <?php endif; ?>
                           </div>

                           <div class="mb-3 col-md-4">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" placeholder="Title" value="<?php echo e(old('title')); ?>" name="title" required>
                              <?php if($errors->has('title')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('title')); ?></p>
                             <?php endif; ?>
                           </div>
                           
                           <div class="mb-3 col-md-4">
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
                        
                        </div>

                         <div class="row">

                           <div class="mb-3 col-md-8">
                              <label class="form-label">Content</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Descriptions" name="content" height="200"><?php echo e(old('content')); ?></textarea>
                              <?php if($errors->has('content')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('content')); ?></p>
                              <?php endif; ?>
                           </div>

                            
                           <div class="mb-3 col-md-4">

                               <div class="mb-3">
                                      <label class="form-label">Image Attribute</label>
                                      <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(old('image_attr')); ?>">
                                      <?php if($errors->has('image_attr')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                                     <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
                                        <?php if($errors->has('meta_title')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                                        <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                          <label class="form-label">Meta Keywords</label>
                                          <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(old('meta_keyword')); ?>">
                                          <?php if($errors->has('meta_keyword')): ?>
                                           <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                                         <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                          <label class="form-label">Meta Description</label>
                                          <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(old('meta_desc')); ?>">
                                          <?php if($errors->has('meta_desc')): ?>
                                           <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                                         <?php endif; ?>
                               </div>
                               <div class="mb-3">
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
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>



                           </div>
                            
 
                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button> &nbsp;<a href="<?php echo e(route('admin_blog_post_show')); ?>" class="btn btn-danger">Back</a>
                           </div>
                           <div class="col-md-6">
                             
                           </div>
                        </div>
                  </form>   
               </div>
            </div>
         </div>
      </div>
      
   </div>
  </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>

<script src="<?php echo e(asset('admin_assets/ckeditor/ckeditor.js')); ?>"></script>

<script type="text/javascript">
   function form_check(post){
         
         if(post.category_id.value == ''){
            alert("Please select a blog category");
            post.category_id.focus();
            return false;
         } else {
           return true;
         }
         

   }
    $(document).ready(function () {


      $(".category_id").select2();


      $(".status").select2();

      var editor = CKEDITOR.replace('content', {
        filebrowserUploadUrl: "<?php echo e(route('blog_post_ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
        height:400,
        extraAllowedContent: 'div(*)',
        allowedContent: true

      });

       //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/blog_post_add.blade.php ENDPATH**/ ?>