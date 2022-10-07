<div class="modal fade" id="viewBlogPostModal<?php echo e($faq->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">FAQ Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                 
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Category</label>
                     <div style="font-weight:bold;">
                        <?php
                        if($faq->FaqCategory){
                           $FaqCategory = $faq->FaqCategory;
                           echo $FaqCategory->name;
                        }
                        ?>
                     </div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Question</label>
                     <div style="font-weight:bold;"><?php echo e($faq->question); ?></div>
                     
                  </div>
                  
                   
                 <div class="mb-3 col-md-12">
                     <label class="form-label">Answer</label>
                     <div style="font-weight:bold;"><?php echo $faq->answer; ?></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div style="font-weight:bold;"><?php echo e($faq->meta_title); ?></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <di style="font-weight:bold;"v><?php echo e($faq->meta_keyword); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div style="font-weight:bold;"><?php echo e($faq->meta_desc); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;"><?php echo e($faq->status); ?></div>
                  </div>
               </div>
         </div>
        
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_faq.blade.php ENDPATH**/ ?>