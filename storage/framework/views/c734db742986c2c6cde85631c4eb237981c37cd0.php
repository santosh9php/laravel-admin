<div class="modal fade" id="viewUserModal<?php echo e($user->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">User Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                    

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;"><?php echo e($user->fname." ".$user->lname); ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Email Id</label>
                     <div style="font-weight:bold;"><?php echo e($user->email); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Country</label>
                     <div style="font-weight:bold;"><?php echo e($user->country); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">State</label>
                     <div style="font-weight:bold;"><?php echo e($user->state); ?></div>
                     
                  </div>


                  <div class="mb-3 col-md-6">
                     <label class="form-label">Mobile Number</label>
                     <div style="font-weight:bold;">
                        <?php if($user->country_code): ?>
                             +<?php echo e($user->country_code); ?>&nbsp;
                        <?php endif; ?>
                        <?php echo e($user->mobile); ?>


                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Gender</label>
                     <div style="font-weight:bold;">
                        <?php if($user->gender == 'm'): ?>
                           Male
                        <?php else: ?>
                           Female
                        <?php endif; ?>
                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Address</label>
                     <div style="font-weight:bold;"><?php echo e($user->address); ?></div>
                     
                  </div>

                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Photo</label>
                     <div style="font-weight:bold;">
                        <?php if($user->photo): ?>
                           <img src="<?php echo e(Storage::url($user->photo)); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                        <?php endif; ?>

                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Role</label>
                     <div style="font-weight:bold;">
                        <?php
                          $userRole = $user->roles->pluck('name','name')->all();
                        ?>
                        <?php if($userRole): ?>
                           <?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php echo e($role); ?> <br>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                     </div>
                  </div>

                  <?php
                     $permissions = '';
                     $userRole = $user->getRoleNames();
                     if($userRole){
                        foreach($userRole as $role){
                           if($role == 'Super Admin'){
                              $permissions = App\Http\Controllers\Admin\RoleController::getAllPermissions();
                           } else {
                              $permissions = $user->getAllPermissions();
                           }
                        }
                     }
                  ?>

                  <?php if($permissions and count($permissions)): ?>

                     <div class="mb-3 col-md-12">
                        <label class="form-label">Permissions</label>
                        <div style="font-weight:bold;">
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

                  <?php endif; ?>


               </div>
         </div>
     
         <div class="modal-footer">
           <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
         </div>
      
      </div>

   </div>
   

</div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/model/view_admin_user.blade.php ENDPATH**/ ?>