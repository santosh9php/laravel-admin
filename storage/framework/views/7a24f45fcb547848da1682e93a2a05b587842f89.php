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
                     <label class="form-label">Company Name</label>
                     <div style="font-weight:bold;"><?php echo e($user->company_name); ?></div>
                     
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

                  
                  <div class="mb-3 col-md-12">
                     <label class="form-label">Photo</label>
                     <div style="font-weight:bold;">
                        <?php if($user->photo): ?>
                           <img src="<?php echo e(Storage::url($user->photo)); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                        <?php endif; ?>
                     </div>
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">GST No.</label>
                     <div style="font-weight:bold;"><?php echo e($user->gst_no); ?></div>
                     
                  </div>

                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">GST Certificate Document</label>
                     <div style="font-weight:bold;">
                        <?php if($user->gst_certificate): ?>
                           <img src="<?php echo e(Storage::url(findImageIcon($user->gst_certificate))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                           <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$user->id,'gst'])); ?>">Download</a>
                        <?php endif; ?>
                     </div>
                  </div>


                  <div class="mb-3 col-md-6">
                     <label class="form-label">PAN No.</label>
                     <div style="font-weight:bold;"><?php echo e($user->pan_no); ?></div>
                     
                  </div>

                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">PAN Card Document</label>
                     <div style="font-weight:bold;">
                        <?php if($user->pan_card): ?>
                           <img src="<?php echo e(Storage::url(findImageIcon($user->pan_card))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                           <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$user->id,'pan'])); ?>">Download</a>
                        <?php endif; ?>
                     </div>
                  </div>
                  
                   <div class="mb-3 col-md-6">
                     <label class="form-label">ID Proof</label>
                     <div style="font-weight:bold;">
                        <?php if($user->id_proof == 'driving_license'): ?>

                           Driving License

                        <?php elseif($user->id_proof == 'adhaar_card'): ?>

                           Adhaar Card

                        <?php elseif($user->id_proof == 'passport'): ?>

                           Passport

                        <?php elseif($user->id_proof == 'voter_id_card'): ?>

                           Voter Id Card

                        <?php endif; ?>
                     </div>
                  </div>

                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">ID Proof Document</label>
                     <div style="font-weight:bold;">
                        <?php if($user->id_proof_document): ?>
                           <img src="<?php echo e(Storage::url(findImageIcon($user->id_proof_document))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                           <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$user->id,'id'])); ?>">Download</a>
                        <?php endif; ?>
                     </div>
                  </div>
                  
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_dealer_user.blade.php ENDPATH**/ ?>