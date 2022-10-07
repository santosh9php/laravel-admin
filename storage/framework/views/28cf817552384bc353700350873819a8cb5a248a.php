<div class="modal fade" id="viewBodypartModal<?php echo e($bodypart->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Body Part Details </h4>
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
                           if($bodypart->category_id){
                              echo $bodypart->category->name;
                           }
                           ?>
                         </b>
                     </div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Parent Body Part</label>
                     <div>
                         <b>
                                <?php
                                if($bodypart->parent){
                                   $parent_bodypart = $bodypart->parent;
                                   echo $parent_bodypart->name;
                                }
                                ?>
                          </b>
                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div><b><?php echo e($bodypart->name); ?> </b></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Description</label>
                     <div><b><?php echo $bodypart->description; ?> </b></div>
                     
                  </div>
                  <?php if($bodypart->image): ?>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="<?php echo e(Storage::url($bodypart->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  <?php endif; ?>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div><b><?php echo e($bodypart->image_attr); ?> </b></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div><b><?php echo e($bodypart->meta_title); ?> </b></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div><b><?php echo e($bodypart->meta_keyword); ?> </b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div><b><?php echo e($bodypart->meta_desc); ?> </b></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div><b><?php echo e($bodypart->status); ?> </b></div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_bodypart.blade.php ENDPATH**/ ?>