<div class="modal fade" id="viewCategoryModal<?php echo e($subcategory->id); ?>">
  
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Category Details</h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Parent Category</label>
                     <div>
                         <b>
                            <?php
                            if($subcategory->parent){
                               $parent_cat = $subcategory->parent;
                               echo $parent_cat->name;
                            }
                            ?>
                        </b>

                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div><b><?php echo e($subcategory->name); ?></b></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Description</label>
                     <div><b><?php echo $subcategory->description; ?></b></div>
                     
                  </div>
                  <?php if($subcategory->image): ?>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="<?php echo e(Storage::url($subcategory->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  <?php endif; ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div><b><?php echo e($subcategory->image_attr); ?></b></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div><b><?php echo e($subcategory->meta_title); ?></b></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div><b><?php echo e($subcategory->meta_keyword); ?></b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div><b><?php echo e($subcategory->meta_desc); ?></b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div><b><?php echo e($subcategory->status); ?></b></div>
                  </div>
               </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/model/view_category_for_subcategory.blade.php ENDPATH**/ ?>