<div class="modal fade" id="viewBlogPostModal<?php echo e($blog_post->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Blog Post Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                 
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Category</label>
                     <div style="font-weight:bold;">
                        <?php
                        if($blog_post->BlogCategory){
                           $BlogCategory = $blog_post->BlogCategory;
                           echo $BlogCategory->name;
                        }
                        ?>
                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Title</label>
                     <div style="font-weight:bold;"><?php echo e($blog_post->title); ?></div>
                     
                  </div>
                  
                   <?php if($blog_post->image): ?>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="<?php echo e(Storage::url($blog_post->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  <?php endif; ?>
                 <div class="mb-3 col-md-12">
                     <label class="form-label">Content</label>
                     <div><?php echo $blog_post->content; ?></div>
                     
                  </div>
                  
                 
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div style="font-weight:bold;"><?php echo e($blog_post->image_attr); ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div style="font-weight:bold;"><?php echo e($blog_post->meta_title); ?></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div style="font-weight:bold;"><?php echo e($blog_post->meta_keyword); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div style="font-weight:bold;"><?php echo e($blog_post->meta_desc); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;"><?php echo e($blog_post->status); ?></div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_blog_post.blade.php ENDPATH**/ ?>