



<?php $__env->startSection('body-content'); ?>

  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add user</h4>
            </div>
         </div>
         
      </div>

      <div class="col-lg-12" id="user_add_model" >
         <div class="card">
            <div id="ajax_dealer_add_state_loader"></div>
            <form action="<?php echo e(route('admin_post_dealer_user_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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

                           <div class="col-md-6"> 
                              <div class="form-group">
                                <label class="mb-1"><strong>First Name</strong></label>
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo e(old('fname')); ?>" required />
                                <?php if($errors->has('fname')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('fname')); ?></p>
                                <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">  
                                <label class="mb-1"><strong>Last Name</strong></label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo e(old('lname')); ?>" required >
                                <?php if($errors->has('lname')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('lname')); ?></p>
                                <?php endif; ?>
                              </div>
                          </div>

                          <div class="col-md-6"> 
                               <div class="form-group"> 
                                   <label class="mb-1"><strong>Company Name</strong></label>
                                   <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="<?php echo e(old('company_name')); ?>" required >
                                   <?php if($errors->has('company_name')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('company_name')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>

                          <div class="col-md-6"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>E-Mail</strong></label>
                                   <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required >
                                   <?php if($errors->has('email')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('email')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>
                          <div class="clearfix"></div>

                          <div class="col-md-6">
                                <div class="form-group">
                                      <label class="mb-1"><strong>Country</strong></label>

                                      <select class="form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
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
                           </div> 

                           <div class="col-md-6">
                              <label class="mb-1"><strong>State</strong></label>
                              <div id="billing_state">
                                    <input type="text" name="state" id="state" value="<?php echo e(old('state')); ?>" class="form-control" required />
                              </div>
                              <?php if($errors->has('state')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('state')); ?></p>
                              <?php endif; ?>
                           </div> 

                           <div class="clearfix"></div>

                          <div class="col-md-3 required"> 
                            <label><strong>Country Code</strong></label>

                            <?php
                                $country_select ='';
                                if(old('country_code') == ''){$country_select ='';} else {$country_select =old('country_code');}
                            ?>

                            <select class="country_code form-control wide" name="country_code" id="country_code" required >
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

                          <div class="col-md-3 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>Mobile No.</strong></label>
                                   <input type="text" class="form-control" placeholder="Mobile No." name="mobile" value="<?php echo e(old('mobile')); ?>" required>
                                   <?php if($errors->has('mobile')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('mobile')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-md-6 required"> 
                              <div class="form-group">
                                   <label class="mb-1"><strong>Photo</strong></label>
                                   <input  class="form-control" placeholder="Photo" type="file" name="photo" >
                                   <?php if($errors->has('photo')): ?>
                                     <p class="text-danger"><?php echo e($errors->first('photo')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>

                         <div class="col-md-6 required"> 
                           <div class="form-group">
                             <label class="mb-1"><strong>Address</strong></label>
                             <textarea  class="form-control" placeholder="Address" name="address"><?php echo e(old('address')); ?></textarea>
                             <?php if($errors->has('address')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                             <?php endif; ?>
                           </div>
                         </div>

                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>Gender</strong></label> <br>
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
                          </div> 
                          <div class="clearfix"></div>
                         
                          <div class="col-md-6 required"> 
                              <div class="form-group">
                                   <label class="mb-1"><strong>GST No.</strong></label>
                                   <input type="text" name="gst_no" placeholder="GST No." class="form-control" value="<?php echo e(old('gst_no')); ?>" required >  
                                   <?php if($errors->has('gst_no')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_no')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-md-6 required">
                              <div class="form-group">
                                <label class="mb-1"><strong>GST Certificate Document</strong></label>
                                <input  class="form-control" type="file" name="gst_certificate" required>
                                <?php if($errors->has('gst_certificate')): ?>
                                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_certificate')); ?></p>
                                <?php endif; ?>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>PAN  No.</strong></label>
                                   <input type="text" name="pan_no" value="<?php echo e(old('pan_no')); ?>" placeholder="PAN  No." class="form-control" required>
                                   <?php if($errors->has('pan_no')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_no')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>PAN  Card Document</strong></label>
                                   <input  class="form-control" type="file" name="pan_card" required>
                                   <?php if($errors->has('pan_card')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_card')); ?></p>
                                   <?php endif; ?>
                             </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>ID Proof</strong> </label>
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
                          </div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>ID Proof Document</strong></label>
                                   <input  class="form-control" type="file" name="id_proof_document" required>
                                   <?php if($errors->has('id_proof_document')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('id_proof_document')); ?></p>
                                   <?php endif; ?>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong> Password</strong></label>  
                                   <input type="password" class="form-control" placeholder="Password" name="password" required>
                              </div>
                             
                          </div>
                          <div class="col-md-6 required"> 
                            <div class="form-group">
                                <label class="mb-1"><strong>Confirm Password</strong></label> 

                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                              </div>

                          </div>
                         <?php if($errors->has('password')): ?>
                           <div class="col-md-12">
                             <p class="text-danger mpg_input_error"><?php echo e($errors->first('password')); ?></p>
                           </div>
                         <?php endif; ?>

                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_dealer_user_show')); ?>" class="btn btn-danger">Back</a>
                           
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

        $("#country").select2();

        $(".country_code").select2();
    })


     function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_dealer',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_dealer_add_state_loader').show();
               },
               complete: function(){
                   $('#ajax_dealer_add_state_loader').hide();
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/dealer_user_add.blade.php ENDPATH**/ ?>