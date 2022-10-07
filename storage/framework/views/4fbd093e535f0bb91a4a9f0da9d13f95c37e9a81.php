



<?php $__env->startSection('body-content'); ?>

  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add role</h4>
            </div>
         </div>
         
      </div>

      <div class="col-lg-12" id="role_add_model" >
         <div class="card">
            <div id="ajax_admin_role_add_state_loader"></div>
            <form action="<?php echo e(route('admin_post_role_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
            <?php echo csrf_field(); ?>
               <div class="card-body">
                  <div class="basic-form">

                     <?php if(Session::has('success') || Session::has('error')): ?>

                        <div class="row ">
                           <div class="col-sm-12">
                              <div class="welcome-text">
                                 
                                 <?php if(Session::has('success')): ?>
                                    <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px;">  
                                    <?php echo Session::get('success'); ?>

                                    </h4>
                                 <?php endif; ?>

                                    <?php if(Session::has('error')): ?>
                                       <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px;">
                                       <?php echo Session::get('error'); ?>

                                       </h4>
                                    <?php endif; ?>
                                 
                              </div>
                           </div>
                           
                        </div>

                        <?php endif; ?>


                     <div class="row"> 

                           
                        <div class="row">

                           <div class="col-md-12">
                              <div class="form-group">
                                   <label class="mb-1"><strong>Name</strong></label>
                                   <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required />
                                   <?php if($errors->has('name')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                                   <?php endif; ?>
                               </div>
                           </div>
                           
                           <div class="col-md-12">
                              <div class="form-group">
                               <label class="mb-1"><strong>Permissions</strong></label>
                                 <br />
                                 <label>
                                    <input class="form-check-input" type="checkbox" name="all_check" id="all_check" value="all"  >&nbsp;&nbsp;All
                                 </label>
                                  <br />
                                    <div class="row">
                                       <?php $count = 0; ?>
                                       <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php 
                                             if($count == 0){
                                                echo '<div class="col-md-3">';
                                             }
                                          ?>
                                          
                                           <label>
                                                <input class="form-check-input permission_check" type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>"  >&nbsp;&nbsp;<?php echo e($permission->displayName); ?>

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

                                       <?php if($count != 12 && $count != 0): ?>
                                           </div>
                                       <?php endif; ?>
                                       
                                      <?php if($errors->has('permission')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('permission')); ?></p>
                                      <?php endif; ?>
                                </div>
                            </div>
                           </div>

                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_role_show')); ?>" class="btn btn-danger">Back</a>
                           
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </form>   
         </div>
      </div>
   </div>
  </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>


<script type="text/javascript">

   $(document).ready(function(){

      //For all check and uncheck

      $('#all_check').click(function() {
          $('.permission_check').prop('checked', this.checked); 
      });

     //End of users check and uncheck

   })

   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/role_add.blade.php ENDPATH**/ ?>