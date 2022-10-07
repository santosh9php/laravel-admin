

<?php $__env->startSection('body-content'); ?>


<!--
<div class="title_background">
   <h2>Registration</h2>
   <ul class="breadcrumb">
      <li><?php echo $breadcrum; ?></li>
   </ul>
</div>
-->
<br><br>
<div class="main-container container">
    <div class="row">
        <div id="ajax_editdealer_state_loader"> </div>
        <form action="<?php echo e(route('user_post_editpf')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
            <?php echo csrf_field(); ?>
           <fieldset id="account">
              <div class=" ">
                 <div class="heading_register">
                    <h2 class="title"> Edit Profile</h2>
                 </div>
               
                <div class="col-lg-12"> 
                    <?php if(Session::has('success')): ?> 
                        <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                        <p class="alert alert-danger  text-center"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                </div> 
               

                 <div class="col-md-6 required"> 
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo e(getFormEditValue($data,'fname')); ?>" required  />
                    <?php if($errors->has('fname')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('fname')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required">  
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo e(getFormEditValue($data,'lname')); ?>" required >
                    <?php if($errors->has('lname')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('lname')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-md-6">
                    <label>Country</label>

                    <select class="default-select form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
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

                <div class="col-md-6">
                    <label>State</label>
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

                <div class="clearfix"></div>
                 <div class="col-md-2 required"> 
                    <label>Country Code</label>
                    <select class="default-select form-control wide" name="country_code" id="country_code" required >
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

                 <div class="col-md-4 required"> 
                    <label>Mobile No.</label>
                    <input type="text" class="form-control" placeholder="Mobile No." name="mobile" value="<?php echo e(getFormEditValue($data,'mobile')); ?>" required>
                    <?php if($errors->has('mobile')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('mobile')); ?></p>
                    <?php endif; ?>
                 </div>

                 <div class="col-md-6 required"> 
                    <label>Address</label>
                    <textarea  class="form-control" placeholder="Address" name="address" rows="1"><?php echo e(getFormEditValue($data,'address')); ?></textarea>
                    <?php if($errors->has('address')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                    <?php endif; ?>
                </div>
                 
                 
                
                <div class="clearfix"></div>

                <div class="col-md-6 required"> 
                    <label>Photo</label>
                    <input  class="form-control" placeholder="Photo" type="file" name="photo" >
                    <?php if($errors->has('photo')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('photo')); ?></p>
                    <?php endif; ?>
                     <?php if($data->photo): ?>
                      <div class="basic-form custom_file_input">
                          <img src="<?php echo e(Storage::url($data->photo)); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                          <br><br>
                      </div>
                  <?php endif; ?>
                 </div>

                 <div class="col-md-6 required">  
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="<?php echo e(getFormEditValue($data,'company_name')); ?>" required >
                    <?php if($errors->has('company_name')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('company_name')); ?></p>
                    <?php endif; ?>
                 </div>
                
                <div class="clearfix"></div>
                <div class="col-md-6 required"> 

                  <span id="captcha_reload"><?php echo captcha_img(); ?></span>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                  </button>

                   <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"  style="margin-top: 10px;" required>

                   <?php if($errors->has('captcha')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('captcha')); ?></p>
                    <br>
                  <?php endif; ?>
                </div>

                 <input type="hidden" name="old_email" value="<?php echo e($data->email); ?>">

                 <input type="hidden" name="old_mobile" value="<?php echo e($data->mobile); ?>">

                 <div class="col-md-12">
                    <button type="submit" class="btn login_btn" type="Continue">Continue </button>
                 </div>
                 <div class="clearfix"></div>
              </div>
           </fieldset>
        </form>
    </div>
</div>
<br><br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
    $('#reload').click(function () {
        var APP_URL = <?php echo json_encode(url('/')); ?>

        $.ajax({
            type: 'GET',
            url: APP_URL+'/reload-captcha',
            success: function (data) {
                $("#captcha_reload").html(data.captcha);
            }
        });
    });

    function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/fetch_state_editprofile',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_editdealer_state_loader').show();
               },
               complete: function(){
                   $('#ajax_editdealer_state_loader').hide();
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_edit_profile.blade.php ENDPATH**/ ?>