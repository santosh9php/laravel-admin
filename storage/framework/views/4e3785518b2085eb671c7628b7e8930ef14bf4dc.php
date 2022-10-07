<div class="modal fade" id="viewRoleModal<?php echo e($role->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Role Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                    

                  <div class="mb-3 col-md-12">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;"><?php echo e($role->name); ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-12">
                     <label class="form-label">Permissions</label>
                     <div style="font-weight:bold;">
                        <?php
                           if($role->name == 'Super Admin'){

                              $permissions = App\Http\Controllers\Admin\RoleController::getAllPermissions();

                           } else {

                              $permissions = App\Http\Controllers\Admin\RoleController::getPermissions($role->id);

                           }

                        ?>
                        <div class="row">
                              <?php $count = 0; ?>
                              <?php if($permissions): ?>
                                 <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                       if($count == 0){
                                          echo '<div class="col-md-3">';
                                       }
                                    ?>
                                        <label>
                                            <?php echo e($permission->displayName); ?>

                                        </label>
                                       <br/>
                                    <?php 
                                       if($count == 0){
                                          
                                       }
                                       $count++;

                                       if($count == 12){
                                          echo '</div>';
                                         $count = 0;
                                       }
                                       
                                    ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                              <?php if($count != 12 && $count != 0): ?>
                                  </div>
                              <?php endif; ?>
                        </div>
                     </div>
                     
                  </div>

                  
                  
                  
               </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
      </div>

   </div>

   </div>
   
</div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/model/view_role.blade.php ENDPATH**/ ?>