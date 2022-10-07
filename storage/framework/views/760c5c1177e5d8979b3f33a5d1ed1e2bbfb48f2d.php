

<?php $__env->startSection('body-content'); ?>
<div class="main-container container">
   <div class="row">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
         <fieldset id="account"> 
            <div class="profile">
               <div class="col-md-3">
                    <div class="profile_background">
                        <div class="photo">
                           <?php if($data->photo): ?>
                               <img src="<?php echo e(Storage::url($data->photo)); ?>" height="150" width="150" >
                           <?php else: ?>
                               <img src="<?php echo e(Storage::url('public/media/image_icon/man.png')); ?>"  height="150" width="150" >
                           <?php endif; ?>
                        </div>
                        <h1 class="title"><?php echo e($data->fname." ".$data->lname); ?></h1>
                        <a class="btn login_btn"  href="<?php echo e(route('user_editpf')); ?>">Edit Profile</a>
                    </div>
               </div>
               <div class="col-md-9">
                  <div class="details">
                     <b>Company Name :</b> <?php echo e($data->company_name); ?> <br>
                     <b>E-Mail :</b> <?php echo e($data->email); ?> <br>
                     <b>Country :</b> <?php echo e($data->country); ?> <br>
                     <b>State :</b> <?php echo e($data->state); ?> <br>
                     <b>Mobile No. :</b> +<?php echo e($data->country_code); ?> <?php echo e($data->mobile); ?>   <br>
                     <b>Gender :</b> 

                        <?php if($data->gender == 'm'): ?>
                           Male
                        <?php else: ?>
                           Female
                        <?php endif; ?>

                     <br>
                     <b>Address :</b> <?php echo e($data->address); ?> <br> 
                     <div class="row">
                        <div class="col-md-3">
                           <b>GST No.:</b> <?php echo e($data->gst_no); ?>

                           <div class="document">
                              <img src="<?php echo e(Storage::url(findImageIcon($data->gst_certificate))); ?>"  width="100" height="100">
                           </div>
                           <div>
                              <a class="btn-small login_btn" title="Download File"  href="<?php echo e(route('user_download',[$data->id,'gst'])); ?>">Download</a>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <b>PAN No. :</b> <?php echo e($data->pan_no); ?>

                           <div class="document">
                              <img src="<?php echo e(Storage::url(findImageIcon($data->pan_card))); ?>"  width="100" height="100">
                           </div>
                           <div>
                              <a class="btn-small login_btn" title="Download File"  href="<?php echo e(route('user_download',[$data->id,'pan'])); ?>">Download</a>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <b>ID Proof :</b>
                           <?php if($data->id_proof = 'driving_license'): ?>
                              Driving License
                           <?php elseif($data->id_proof = 'adhaar_card'): ?>
                              Adhaar Card
                           <?php elseif($data->id_proof = 'passport'): ?>
                              Passport
                           <?php elseif($data->id_proof = 'voter_id_card'): ?>
                              Voter Id Card
                           <?php endif; ?>
                           <div class="document">
                              <img src="<?php echo e(Storage::url(findImageIcon($data->id_proof_document))); ?>"  width="100" height="100">
                           </div>
                           <div>
                              <a class="btn-small login_btn" title="Download File"  href="<?php echo e(route('user_download',[$data->id,'id'])); ?>">Download</a>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
                <div class="clearfix"></div>
            </div> 
         </fieldset>
      </form>
   </div>
</div>

<br><br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_view_profile.blade.php ENDPATH**/ ?>