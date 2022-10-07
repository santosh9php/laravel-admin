


<?php $__env->startSection('body-content'); ?>
<div class="authincation h-100">
         <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-8">
                  <div class="authincation-content">
                     <div class="row no-gutters">
                        <div class="col-xl-12">
                           <div class="auth-form">
                              <div class="text-center mb-3">
                                 <img src="<?php echo e(asset('admin_assets/images/logo-full-black.png')); ?>" alt="">
                                 <br> &nbsp;
                                  <h3 class="text-center mb-4">Sign Up Your Account</h3>
                              </div>
                              <form action="<?php echo e(route('admin_post_register')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if(Session::has('success')): ?>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                            <p class="text-danger mpg_top_error"><?php echo Session::get('success'); ?></p>
                                      <div>
                                  </div>
                                </div>
                                <?php endif; ?>
                                <?php if(Session::has('error')): ?>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                            <p class="text-danger mpg_top_error"><?php echo e(Session::get('error')); ?></p>
                                      <div>
                                  </div>
                                </div>
                                <?php endif; ?>
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
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                      <label class="mb-1"><strong>Email Id</strong></label>
                                    <input type="email" class="form-control" placeholder="" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                      <p class="text-danger mpg_input_error"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                 </div>
                                    </div>

                                    <div class="col-md-6 required"> 
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


                                    <div class="col-md-6">
                                       <div class="form-group">
                                     <label class="mb-1"><strong>Mobile No.</strong></label>
                                    <input type="text" class="form-control" placeholder="" name="mobile" value="<?php echo e(old('mobile')); ?>" required>
                                    <?php if($errors->has('mobile')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('mobile')); ?></p>
                                    <?php endif; ?>
                                 </div>
                                    </div>


                                    <div class="col-md-6 mt-12">

                                    <label class="mb-1"><strong>Gender:</strong></label> <br>

                                     <?php if(old('gender') === null OR old('gender') == 'm'): ?>
                                    <div class="form-group">
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


                                 </div>                                 

                                 <div class="form-group">
                                    <label class="mb-1"><strong>Photo</strong></label>
                                    <div class="basic-form custom_file_input"> 
                                       <div class="input-group">
                                          <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                             <input type="file" class="form-file-input form-control" name="photo">
                                          </div>
                                          <span class="input-group-text">Upload</span>
                                       </div>
                                    </div>
                                 </div>

                                


                                 
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Address</strong></label>
                                    <textarea  class="form-control" name="address"><?php echo e(old('address')); ?></textarea>
                                    <?php if($errors->has('address')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                                    <?php endif; ?>
                                 </div>


 



                                    <div class="row">
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


                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                 </div>
                                 <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="<?php echo e(route('admin_login')); ?>">Sign in</a></p>
                                 </div>


                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/register.blade.php ENDPATH**/ ?>