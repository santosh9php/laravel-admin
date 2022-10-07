<?php
   if(Route::currentRouteName() == 'admin_role_show'){
      edit_redirect_query_string('admin_role_show');
   }
?>



<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
      <div class="container-fluid">
         <!-- Add Project -->
         <div class="row page-titles mb-0 border-bottom mx-0">
            <div class="col-sm-6 p-md-0">
               <div class="welcome-text">
                  <h4 class="mt-2 font-weight-bold">Roles Management</h4>
               </div>
            </div>

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-add')): ?>

                  <a class="btn btn-success product_add_button" href="<?php echo e(route('admin_role_form_show')); ?>">Add Role</a> 
               <?php endif; ?>
            </div>
         </div>

         <?php if(Session::has('success') || Session::has('error')): ?>
            <div class="row page-titles mb-0 border-bottom mx-0">
               <div class="col-sm-12 p-md-0">
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
         
         <?php echo $__env->make('admin.role_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  </div>

   <!--For Model -->
   <!-- Delete role -->
   <?php echo $__env->make('admin.model.delete_role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- End of delete role -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

  <script type="text/javascript">
     $(document).ready(function(){
         $(".role_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("role");
            $("#role_id").val(id);
            
          });
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/role.blade.php ENDPATH**/ ?>