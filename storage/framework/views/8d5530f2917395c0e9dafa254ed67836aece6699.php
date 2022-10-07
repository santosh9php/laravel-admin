


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add FAQ</h4>
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
                  <form action="<?php echo e(route('admin_post_faq_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <div class="basic-form">

                         
                        
                        <div class="row">

                           

                           
                           <div class="mb-3 col-md-6">
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

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Question</label>
                              <input type="text" class="form-control" placeholder="Question" value="<?php echo e(old('question')); ?>" name="question" required>
                              <?php if($errors->has('question')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('question')); ?></p>
                             <?php endif; ?>
                           </div>
                           
                           
                        </div>

                       

                         <div class="row">

                           <div class="mb-3 col-md-8">
                              <label class="form-label">Answer</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Answer" name="answer" height="200"><?php echo e(old('answer')); ?></textarea>
                              <?php if($errors->has('answer')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('answer')); ?></p>
                              <?php endif; ?>
                           </div>

                           

                        

                           <div class="mb-3 col-md-4">


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
                                <div class="mb-3">

                                </div>
                                <div class="mb-3">

                                </div>

 


                           </div>
 

                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_faq_show')); ?>" class="btn btn-danger">Back</a>
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
   function form_check(faq){
         
         if(faq.category_id.value == ''){
            alert("Please select a faq category");
            faq.category_id.focus();
            return false;
         } else {
           return true;
         }
         

   }
    $(document).ready(function () {

      $(".category_id").select2();

      $(".status").select2();

      var editor = CKEDITOR.replace('answer', {
        filebrowserUploadUrl: "<?php echo e(route('faq_ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
        height:400,
        extraAllowedContent: 'div(*)',
        allowedContent: true

      });

      //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/faq_add.blade.php ENDPATH**/ ?>