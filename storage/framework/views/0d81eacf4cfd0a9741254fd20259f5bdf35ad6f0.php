


<?php $__env->startSection('body-content'); ?>
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info">
                                 
                                    <?php if($data->photo): ?>
                                       <div class="profile-photo">
                                          <img style="border: 10px solid #fff;" src="<?php echo e(Storage::url(findMTPath($data->photo))); ?>" class="img-fluid rounded-circle" alt="">
                                       </div>
                                    <?php endif; ?>
                                   
                                </div>
                            </div>

                             <div class="profile-details">
                                       <div class="profile-name px-2 pt-2">
                                          <h3 class="text-primary mb-0"><?php echo e($data->fname. " ".$data->lname); ?></h3>
                                       </div>
                                       
                                       <div class="dropdown ml-auto px-2"> 
                                          <a class="btn btn-primary light sharp" href="<?php echo e(route('admin_editpf')); ?>"><i class="fa fa-edit text-primary"></i> Edit Profile</a> 
                                       </div>
                                    </div>


                              <div class="clearfix mb-3"></div>


                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                        <p class="mb-0">Email</p>
                                    <h4 class="text-muted mb-0"><?php echo e($data->email); ?></h4>
                                   
                                 </div>
                                </div>

                               

                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                        <p class="mb-0">Mobile No.</p>
                                    <h4 class="text-muted mb-0">
                                        <?php if($data->country_code): ?>
                                            +<?php echo e($data->country_code); ?>&nbsp;
                                        <?php endif; ?>
                                        <?php echo e($data->mobile); ?>


                                    </h4>
                                   
                                 </div>
                                </div>

                                 

                                 <div class="col-lg-4">
                                    <div class="profile-email px-2 pt-2">
                                       <p class="mb-0">Gender</p>
                                       <?php if($data->gender == 'm'): ?>
                                          <h4 class="text-muted mb-0">Male</h4>
                                       <?php else: ?>
                                          <h4 class="text-muted mb-0">Female</h4>

                                       <?php endif; ?>
                                    
                                 </div>


                                </div>  

                                    <div class="col-lg-4">
                                        <div class="profile-email px-2 pt-2">
                                            <p class="mb-0">Country</p>
                                            <h4 class="text-muted mb-0"><?php echo e($data->country); ?></h4>
                                           
                                        </div>
                                    </div>

                                     <div class="col-lg-4">
                                        <div class="profile-email px-2 pt-2">
                                            <p class="mb-0">State</p>
                                            <h4 class="text-muted mb-0"><?php echo e($data->state); ?></h4>
                                           
                                         </div>
                                    </div>

                                     <div class="col-lg-4"></div>



                                 <div class="col-lg-12">
                                    <div class="profile-email px-2 pt-2 mt-3">
                                        <p class="mb-0">Address</p>
                                    <h4 class="text-muted mb-0"><?php echo e($data->address); ?></h4>
                                   
                                 </div>
                                </div> 

                                <div class="clearfix mb-5"></div>
                               
                                </div>

                        </div>
                    </div>
               </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/view_profile.blade.php ENDPATH**/ ?>