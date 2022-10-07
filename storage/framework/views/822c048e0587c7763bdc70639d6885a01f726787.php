



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
            <div id="ajax_admin_user_add_state_loader"></div>
            <form action="<?php echo e(route('admin_post_user_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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
                                   <input type="text" class="form-control" name="fname" value="<?php echo e(old('fname')); ?>" required />
                                   <?php if($errors->has('fname')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('fname')); ?></p>
                                   <?php endif; ?>
                               </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                               <label class="mb-1"><strong>Last Name</strong></label>
                               <input type="text" class="form-control" name="lname" value="<?php echo e(old('lname')); ?>" required >
                               <?php if($errors->has('lname')): ?>
                                 <p class="text-danger mpg_input_error"><?php echo e($errors->first('lname')); ?></p>
                               <?php endif; ?>
                            </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Email Id</strong></label>
                                 <input type="email" class="form-control" placeholder="" name="email" value="<?php echo e(old('email')); ?>" required>
                                 <?php if($errors->has('email')): ?>
                                   <p class="text-danger mpg_input_error"><?php echo e($errors->first('email')); ?></p>
                                 <?php endif; ?>
                              </div>
                           </div>

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


                           <div class="col-md-3 required"> 
                               <label>Country Code</label>

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

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Mobile No.</strong></label>
                                 <input type="text" class="form-control" placeholder="" name="mobile" value="<?php echo e(old('mobile')); ?>" required>
                                 <?php if($errors->has('mobile')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('mobile')); ?></p>
                                 <?php endif; ?>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Photo</strong></label>
                                 <div class="basic-form custom_file_input"> 
                                    <div class="input-group">
                                       <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                          <input type="file" class="form-file-input form-control" name="photo">
                                       </div>
                                       <span class="input-group-text">Upload</span>
                                    </div>
                                    <?php if($errors->has('photo')): ?>
                                      <p class="text-danger"><?php echo e($errors->first('photo')); ?></p>
                                    <?php endif; ?>
                                    </div>
                                 </div>
                              </div>

                           <div class="col-md-6 mt-6">
                               <?php if(old('gender') === null OR old('gender') == 'm'): ?>
                                 <div class="form-group">
                                     <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <div class="clearfix"></div>
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="m" checked>  Male  </label>&nbsp;&nbsp;
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="f"> Female</label> 
                                    <?php if($errors->has('gender')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('gender')); ?></p>
                                    <?php endif; ?>

                                 </div>
                              <?php else: ?>
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="clearfix"></div>
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="m" >  Male  </label>&nbsp;&nbsp;
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="f" checked> Female</label> 
                                    <?php if($errors->has('gender')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('gender')); ?></p>
                                    <?php endif; ?>
                                 </div>
                              <?php endif; ?>
                           </div>  

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Address</strong></label>
                                 <textarea  class="form-control" name="address"><?php echo e(old('address')); ?></textarea>
                                 <?php if($errors->has('address')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                                 <?php endif; ?>
                              </div>
                           </div> 

                           <div class="col-md-6">
                              <div class="form-group">
                                  <label class="mb-1"><strong>Password</strong></label>
                                 <input type="password" class="form-control" placeholder="" name="password" required>
                               
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Confirm Password</strong></label>
                                 <input type="password" class="form-control" placeholder="" name="password_confirmation" required>
                              </div>
                           </div>

                        </div>

                        <?php if($errors->has('password')): ?>
                           <div class="row">
                             <div class="col-md-12">
                               <p class="text-danger mpg_input_error"><?php echo e($errors->first('password')); ?></p>
                             </div>
                           </div>
                       <?php endif; ?>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_user_show')); ?>" class="btn btn-danger">Back</a>
                           
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
               url:  '/admin/fetch_state_admin',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_admin_user_add_state_loader').show();
               },
               complete: function(){
                   $('#ajax_admin_user_add_state_loader').hide();
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/admin_user_add.blade.php ENDPATH**/ ?>