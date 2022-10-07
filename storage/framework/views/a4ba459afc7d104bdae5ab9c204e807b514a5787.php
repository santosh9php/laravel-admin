


<?php $__env->startSection('body-content'); ?>
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;"> Edit Profile</h4>
            </div>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="basic-form">
                  <div id="ajax_editprofile_state_loader"></div>
                  <form action="<?php echo e(route('admin_editpf')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                      <div class="row">
                        <div class="col-md-12">
                            <?php if(Session::has('success')): ?>
                                <p class="text-success"><?php echo Session::get('success'); ?></p>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <?php if(Session::has('error')): ?>
                                <p class="text-danger"><?php echo Session::get('error'); ?></p>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>First Name</strong></label>
                              <input type="text" class="form-control" name="fname" value="<?php echo e(getFormEditValue($data,'fname')); ?>" required>
                              <?php if($errors->has('fname')): ?>
                                <p class="text-danger"><?php echo e($errors->first('fname')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>Last Name</strong></label>
                              <input type="text" class="form-control" name="lname" value="<?php echo e(getFormEditValue($data,'lname')); ?>" required >
                              <?php if($errors->has('lname')): ?>
                                <p class="text-danger"><?php echo e($errors->first('lname')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                      </div>
                     <div class="row">

                        <div class="col-md-6">
                                <div class="form-group">
                                      <label class="mb-1"><strong>Country</strong></label>

                                      <select class="form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
                                         <option value="">Select Country</option>
                                         <?php if($countries): ?>
                                             <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option <?php if(getFormEditValue($data,'country') == $country->name): ?> selected <?php endif; ?> value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
                                      </select>
                                      <?php if($errors->has('country')): ?>
                                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('country')); ?></p>
                                      <?php endif; ?>
                                </div>
                           </div> 

                           <div class="col-md-6">
                              <label class="mb-1"><strong>State</strong></label>
                              <div id="billing_state">
                                 <?php if($data->country == 'India'): ?>
                                     <select class="default-select form-control wide" name="state" id="state" required >
                                         <option value="">Select State</option>
                                         <?php if($states): ?>
                                             <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option <?php if(getFormEditValue($data,'state') == $state->name): ?> selected <?php endif; ?> value="<?php echo e($state->name); ?>"><?php echo e($state->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
                                     </select>
                                 <?php else: ?>
                                    <input type="text" name="state" id="state" value="<?php echo e(getFormEditValue($data,'state')); ?>" class="form-control" required />
                                 <?php endif; ?>
                              </div>
                              <?php if($errors->has('state')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('state')); ?></p>
                              <?php endif; ?>
                           </div> 

                        <div class="col-md-6 required"> 
                            <label>Country Code</label>
                            <select class="form-control wide" name="country_code" id="country_code" required >
                                <option value="">Select Country</option>
                                <?php if($countries): ?>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(getFormEditValue($data,'country_code') == $country->phone): ?> selected <?php endif; ?> value="<?php echo e($country->phone); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>

                            <?php if($errors->has('country_code')): ?>
                                <p class="text-danger mpg_input_error"><?php echo e($errors->first('country_code')); ?></p>
                            <?php endif; ?>
                         </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>Mobile No.</strong></label>
                              <input type="text" class="form-control" placeholder="" name="mobile" value="<?php echo e(getFormEditValue($data,'mobile')); ?>" required>
                              <?php if($errors->has('mobile')): ?>
                                <p class="text-danger"><?php echo e($errors->first('mobile')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group">
                              <label class="mb-1"><strong>Gender:</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <?php if(getFormEditValue($data,'gender') == 'm'): ?>
                                  <label class="radio-inline mr-3"><input type="radio"  name="gender" value="m" checked>  Male  </label>&nbsp;&nbsp;
                                  <label class="radio-inline mr-3"><input type="radio" name="gender" value="f"> Female</label> 
                              <?php else: ?>
                                  <label class="radio-inline mr-3"><input type="radio" name="gender" value="m" >  Male  </label>&nbsp;&nbsp;
                                  <label class="radio-inline mr-3"><input type="radio"  name="gender" value="f" checked> Female</label> 

                              <?php endif; ?>
                              <?php if($errors->has('gender')): ?>
                                <p class="text-danger"><?php echo e($errors->first('gender')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="mb-1"><strong>Photo</strong></label>
                        <div class="basic-form custom_file_input">
                           <div class="input-group">
                              <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                 <input type="file" name="photo" class="form-file-input form-control">
                              </div>
                              <span class="input-group-text">Upload</span>
                              <?php if($errors->has('photo')): ?>
                                <p class="text-danger"><?php echo e($errors->first('photo')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                        <?php if($data->photo): ?>
                            <div class="basic-form custom_file_input">
                                <img src="<?php echo e(Storage::url($data->photo)); ?>"  class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                            </div>
                        <?php endif; ?>
                     </div>
                     <div class="row">
                        
                     </div>
                     <div class="form-group">
                        <label class="mb-1"><strong>Address</strong></label>
                        <textarea  class="form-control" name="address"><?php echo e(getFormEditValue($data,'address')); ?></textarea>
                        <?php if($errors->has('address')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                        <?php endif; ?>
                     </div>
                    
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>


<script type="text/javascript">

   function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_admin',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_editprofile_state_loader').show();
               },
               complete: function(){
                   $('#ajax_editprofile_state_loader').hide();
               },
               success: function (data) {
                  console.log(data);
                  $('#billing_state').html(data.state);
               },
               error: function (requestObj, textStatus, errorThrown) {
                   console.log(requestObj);
               },
           });
        }
    }

    $(document).ready(function(){

      $("#country_code").select2();

      $("#country").select2();

    })
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/edit_profile.blade.php ENDPATH**/ ?>