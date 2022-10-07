<div class="modal fade" id="viewCategoryModal<?php echo e($category->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Vehicle Types Details</h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                  <?php /* ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Parent Category</label>
                     <div>
                         <b>
                                <?php
                                if($category->parent){
                                   $parent_cat = $category->parent;
                                   echo $parent_cat->name;
                                }
                                ?>
                         </b>
                     </div>
                     
                  </div>
                  <?php */ ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div><b><?php echo e($category->name); ?></b></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Description</label>
                     <div><b><?php echo $category->description; ?></b></div>
                     
                  </div>
                  <?php if($category->image): ?>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="<?php echo e(Storage::url($category->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  <?php endif; ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div><b><?php echo e($category->image_attr); ?></b></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div><b><?php echo e($category->meta_title); ?></b></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div><b><?php echo e($category->meta_keyword); ?></b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div><b><?php echo e($category->meta_desc); ?></b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div><b><?php echo e($category->status); ?></b></div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_category.blade.php ENDPATH**/ ?>