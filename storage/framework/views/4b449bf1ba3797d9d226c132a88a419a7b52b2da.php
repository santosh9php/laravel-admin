


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit FAQ</h4>
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



      <div class="col-lg-12" id="faq_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_faq_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                       
                        
                        <div class="row">

                           

                            <div class="mb-3 col-md-6">
                              <label class="form-label">Category</label>
                              <select class="category_id  form-control wide" name="category_id" required >
                                 <option value="">Select Category</option>
                                 <?php if($categories): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php $dash=''; ?>
                                       <option value="<?php echo e($category_edit->id); ?>" <?php if($category_edit->id == getFormEditValue($faq,'category_id')): ?> selected <?php endif; ?> ><?php echo e($category_edit->name); ?></option>
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                              <?php if($errors->has('category_id')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('category_id')); ?></p>
                             <?php endif; ?>
                          </div>

                          <div class="mb-3 col-md-6">
                              <label class="form-label">Question</label>
                              <input type="text" class="form-control" placeholder="Question" value="<?php echo e(getFormEditValue($faq,'question')); ?>" name="question" id="question" required >
                              <?php if($errors->has('question')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('question')); ?></p>
                             <?php endif; ?>
                           </div>
                        
                        </div>

                        <div class="row">
                           <div class="mb-3 col-md-8">
                              <label class="form-label">Answer</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Answer" name="answer" id="answer"><?php echo e(getFormEditValue($faq,'answer')); ?></textarea>
                              <?php if($errors->has('answer')): ?>
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('answer')); ?></p>
                              <?php endif; ?>
                           </div>
                           
                        
                           
                           <div class="mb-3 col-md-4">

                               <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                      <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(getFormEditValue($faq,'meta_title')); ?>">
                                      <?php if($errors->has('meta_title')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                                      <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                      <label class="form-label">Meta Keywords</label>
                                      <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(getFormEditValue($faq,'meta_keyword')); ?>">
                                      <?php if($errors->has('meta_keyword')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                                      <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                      <label class="form-label">Meta Description</label>
                                      <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(getFormEditValue($faq,'meta_desc')); ?>">
                                      <?php if($errors->has('meta_desc')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                                      <?php endif; ?>
                               </div>
                               <div class="mb-3">
                                      <label class="form-label" id="status">Status</label>
                                      <select class="status  form-control wide" name="status" required >
                                         <option value="" <?php if(getFormEditValue($faq,'status') == ""): ?> selected <?php endif; ?>>Choose Status</option>
                                         <option value="active" <?php if(getFormEditValue($faq,'status') == "active"): ?> selected <?php endif; ?>>Active</option>
                                         <option value="inactive" <?php if(getFormEditValue($faq,'status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                                      </select>
                                      <?php if($errors->has('status')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                                      <?php endif; ?>
                               </div>
                              

                             
                           </div>
                           
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(url(route('admin_faq_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                        
                        </div>
                     </div>
                     <input type="hidden" name="faq_id" value="<?php echo e($faq->id); ?>">
                  </form>   
               </div>
            </div>
         </div>
      </div>
      
   </div>
  </div>

<!-- Image Delete Modal -->

<div class="modal" id="image_delete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Image Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="image_delete_msg">Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- End of image delete -->

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

      CKEDITOR.replace('answer', {
        filebrowserUploadUrl: "<?php echo e(route('faq_ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
        height :400,
        extraAllowedContent: 'div(*)',
        allowedContent: true
      });

      


      //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/faq_edit.blade.php ENDPATH**/ ?>