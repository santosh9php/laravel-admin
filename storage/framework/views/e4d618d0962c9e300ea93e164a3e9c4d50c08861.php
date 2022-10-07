<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                       
                       
                       <div class="col-lg-9 mb-9"></div>

                       <div class="col-lg-3 mb-3">
                           
                       </div>

                    </div>

               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                             
                              <th class="sno"><strong>S No.</strong></th>
                              <th ><strong>Name</strong></th>
                              <th class="view"><strong>View</strong></th>
                              <th class="edit_delete"><strong> Edit/Delete</strong></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              session(['role_counter' => 1]);
                           ?>
                           <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 
                                 <td style="text-align:center;">

                                    <?php echo e(session('role_counter')); ?>

                                    <?php 
                                       session(['role_counter' => session('role_counter')+1]);
                                    ?>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center"><?php echo e($role->name); ?></div>
                                 </td>

                                 <td align="center">
                                    

                                       <a href=""  data-role="<?php echo e($role->id); ?>" data-toggle="modal" data-target="#viewRoleModal<?php echo e($role->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                 </td>
                               
                                 <td style="text-align:center;"> 

                                    <?php if($role->name != 'Registered User' && $role->name != 'Super Admin'): ?>

                                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>

                                          <a href="<?php echo e(route('admin_role_edit',[$role->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

                                       <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>

                                          <a href=""  data-role="<?php echo e($role->id); ?>" data-toggle="modal" data-target="#delete_role" class="btn btn-danger shadow btn-xs sharp role_delete"><i class="fa fa-trash"></i></a>

                                       <?php endif; ?>

                                    <?php endif; ?>
                                     
                                 </td>
                              </tr>
                              <?php echo $__env->make('admin.model.view_role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr><td colspan="12">
                                 <div class="d-flex justify-content-center">
                                     <?php echo e($roles->links()); ?>

                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/role_show.blade.php ENDPATH**/ ?>