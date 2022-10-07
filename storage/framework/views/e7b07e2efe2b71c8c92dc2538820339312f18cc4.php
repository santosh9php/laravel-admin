

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
         <div id="ajax_reg_state_loader"> </div>
        <form action="<?php echo e(route('user_post_register')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
           <fieldset id="account">
              <div class=" ">
                 <div class="heading_register">
                    <h2 class="title"> Register Account</h2>
                    <p>If you already have an account with us, please login at the <a href="<?php echo e(route('user_login')); ?>">login page</a>.</p>
                 </div>
                <?php echo csrf_field(); ?>
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
                    <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo e(old('fname')); ?>" required />
                    <?php if($errors->has('fname')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('fname')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required">  
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo e(old('lname')); ?>" required >
                    <?php if($errors->has('lname')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('lname')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-md-6 required">  
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="<?php echo e(old('company_name')); ?>" required >
                    <?php if($errors->has('company_name')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('company_name')); ?></p>
                    <?php endif; ?>
                 </div>

                 <div class="col-md-6 required"> 
                    <label>E-Mail</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required >
                    <?php if($errors->has('email')): ?>
                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>

                <div class="col-md-6">
                    <label>Country</label>

                    <select class="default-select form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
                        <option value="">Select Country</option>
                        <?php if($countries): ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if(old('country') == $country->name): ?> selected <?php endif; ?> value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
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
                        <input type="text" name="state" id="state" value="<?php echo e(old('state')); ?>" class="form-control" required />
                    </div>
                    <?php if($errors->has('state')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('state')); ?></p>
                    <?php endif; ?>
                </div> 

                <div class="clearfix"></div>

                 <div class="col-md-2 required"> 
                    <label>Country Code</label>

                    <?php
                        $country_select ='';
                        if(old('country_code') == ''){$country_select ='';} else {$country_select =old('country_code');}
                    ?>

                    <select class="default-select form-control wide" name="country_code" id="country_code" required >
                        <option value="">Select Country</option>
                        <?php if($countries): ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($country_select == $country->phone): ?> selected <?php endif; ?> value="<?php echo e($country->phone); ?>"><?php echo e($country->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>

                    <?php if($errors->has('country_code')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('country_code')); ?></p>
                    <?php endif; ?>
                 </div>

                 <div class="col-md-4 required"> 
                    <label>Mobile No.</label>
                    <input type="text" class="form-control" placeholder="Mobile No." name="mobile" value="<?php echo e(old('mobile')); ?>" required>
                    <?php if($errors->has('mobile')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('mobile')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required"> 
                    <label>Photo</label>
                    <input  class="form-control" placeholder="Photo" type="file" name="photo" >
                    <?php if($errors->has('photo')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('photo')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>

                <div class="col-md-6 required"> 
                    <label>Address</label>
                    <textarea  class="form-control" placeholder="Address" name="address"><?php echo e(old('address')); ?></textarea>
                    <?php if($errors->has('address')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                    <?php endif; ?>
                </div>

                 <div class="col-md-6 required">
                    <label>Gender</label> <br>
                    <?php if(old('gender') === null OR old('gender') == 'm'): ?>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="m" checked> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="f"> Female
                        </label>
                        <?php if($errors->has('gender')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('gender')); ?></p>
                        <?php endif; ?>
                    <?php else: ?>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="m" > Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="f" checked> Female
                        </label>
                        <?php if($errors->has('gender')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('gender')); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                 </div> 
                 <div class="clearfix"></div>
                
                 <div class="col-md-6 required"> 
                    <label>GST No.</label>
                    <input type="text" name="gst_no" placeholder="GST No." class="form-control" value="<?php echo e(old('gst_no')); ?>" required >  
                    <?php if($errors->has('gst_no')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_no')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required">
                    <label>GST Certificate Document</label>
                    <input  class="form-control" type="file" name="gst_certificate" required>
                    <?php if($errors->has('gst_certificate')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_certificate')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-md-6 required"> 
                    <label>PAN  No.</label>
                    <input type="text" name="pan_no" value="<?php echo e(old('pan_no')); ?>" placeholder="PAN  No." class="form-control" required>
                    <?php if($errors->has('pan_no')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_no')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required">
                    <label>PAN  Card Document</label>
                    <input  class="form-control" type="file" name="pan_card" required>
                    <?php if($errors->has('pan_card')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_card')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-md-6 required">
                    <label>ID Proof </label>
                    <select class="form-control" name="id_proof" required>
                       <option value="" >Select Id Proof</option>
                       <option value="driving_license" <?php if(old('id_proof') == 'driving_license') { echo 'selected'; } ?>  >Driving License</option>
                       <option value="adhaar_card" <?php if(old('id_proof') == 'adhaar_card') { echo 'selected'; } ?>>Adhaar Card</option>
                       <option value="passport" <?php if(old('id_proof') == 'passport') { echo 'selected'; } ?>>Passport</option>
                       <option value="voter_id_card" <?php if(old('id_proof') == 'voter_id_card') { echo 'selected'; } ?>>Voter Id Card</option>
                    </select>
                    <?php if($errors->has('id_proof')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('id_proof')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="col-md-6 required">
                    <label>ID Proof Document</label>
                    <input  class="form-control" type="file" name="id_proof_document" required>
                    <?php if($errors->has('id_proof_document')): ?>
                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('id_proof_document')); ?></p>
                    <?php endif; ?>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-md-6 required"> 
                    <label> Password </label>  
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    
                 </div>
                 <div class="col-md-6 required"> 
                    <label>Confirm Password</label> 

                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>

                 </div>
                <?php if($errors->has('password')): ?>
                  <div class="col-md-12">
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('password')); ?></p>
                  </div>
                <?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7 = $component; } ?>
<?php $component = $__env->getContainer()->make(Lukeraymonddowning\Honey\Views\Honey::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('honey'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Lukeraymonddowning\Honey\Views\Honey::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7)): ?>
<?php $component = $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7; ?>
<?php unset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7); ?>
<?php endif; ?>

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

                <!--
                <div class="col-sm-12">
                    <div style="padding:10px 0;">
                       <input class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;I have read and agree to the <a href="#" class="agree"><b>Pricing Tables</b></a>
                    </div>
                 </div>
                -->

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
               url:  '/fetch_state_registeration',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_reg_state_loader').show();
               },
               complete: function(){
                   $('#ajax_reg_state_loader').hide();
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
<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/user_register.blade.php ENDPATH**/ ?>