<div class="modal fade" id="viewBrandModal<?php echo e($subbrand->id); ?>">
 <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Segment Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Vehicle Type</label>
                     <div>
                         <b> 
                           <?php
                           if($brand->category_id){
                              echo $brand->category->name;
                           }
                           ?>
                         </b>
                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Parent Segment</label>
                     <div>
                        <b>
                            <?php
                            if($subbrand->parent){
                               $parent_brand = $subbrand->parent;
                               echo $parent_brand->name;
                            }
                            ?> 
                        </b>
                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div><b><?php echo e($subbrand->name); ?> </b></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Description</label>
                     <div><b><?php echo $subbrand->description; ?> </b></div>
                     
                  </div>
                  <?php if($subbrand->image): ?>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="<?php echo e(Storage::url($subbrand->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  <?php endif; ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div><b><?php echo e($subbrand->image_attr); ?> </b></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div><b><?php echo e($subbrand->meta_title); ?> </b></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div><b><?php echo e($subbrand->meta_keyword); ?> </b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div><b><?php echo e($subbrand->meta_desc); ?> </b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div><b><?php echo e($subbrand->status); ?> </b></div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_brand_for_subbrand.blade.php ENDPATH**/ ?>