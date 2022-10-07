<div class="modal fade" id="viewContUsersModal<?php echo e($cont_users->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Contact Us Users Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                 
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;"><?php echo e($cont_users->name); ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Email</label>
                     <div style="font-weight:bold;"><?php echo e($cont_users->email); ?></div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Spare Part Name</label>
                     <div style="font-weight:bold;"><?php echo e($cont_users->part_name); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-12">
                     <label class="form-label">message</label>
                     <div style="font-weight:bold;"><?php echo $cont_users->message; ?></div>
                     
                  </div>
                  
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_cont_users.blade.php ENDPATH**/ ?>