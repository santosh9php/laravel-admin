


<?php $__env->startSection('body-content'); ?>
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">
                  Edit user 
                  <br><br>
                  <?php if($data->email): ?>
                    Email Id : <?php echo e($data->email); ?>                  
                  <?php endif; ?>
                  <br><br>
                  <?php if($data->mobile): ?>
                    Mobile Number : <?php echo e($data->mobile); ?>                  
                  <?php endif; ?>
               </h4>
            </div>
         </div>
         
      </div>
      

      <div class="col-lg-12" id="user_add_model" >
            <div class="card">
               <div id="ajax_dealer_edit_state_loader"></div>
               <form action="<?php echo e(route('admin_put_dealer_user_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
               <?php echo csrf_field(); ?>
               <?php echo method_field('PUT'); ?>
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

                              <div class="col-md-6"> 
                                  <div class="form-group"> 
                                      <label class="mb-1"><strong>Company Name</strong></label>
                                      <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="<?php echo e(getFormEditValue($data,'company_name')); ?>" required >
                                      <?php if($errors->has('company_name')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('company_name')); ?></p>
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




                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Address</strong></label>
                                    <textarea  class="form-control" name="address"><?php echo e(getFormEditValue($data,'address')); ?></textarea>
                                    <?php if($errors->has('address')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('address')); ?></p>
                                    <?php endif; ?>
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Photo</strong></label>
                                    <div class="basic-form custom_file_input">
                                       <div class="input-group">
                                          <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                             <input type="file" name="photo" class="form-file-input form-control">
                                          </div>
                                          <span class="input-group-text">Upload</span>
                                         
                                       </div>
                                       <?php if($errors->has('photo')): ?>
                                         <p class="text-danger"><?php echo e($errors->first('photo')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <?php if($data->photo): ?>
                                        <div class="basic-form custom_file_input">
                                            <img src="<?php echo e(Storage::url($data->photo)); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                                        </div>
                                    <?php endif; ?>
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="clearfix"></div>
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



                              <div class="col-md-6 required"> 
                                 <div class="form-group">
                                      <label class="mb-1"><strong>GST No.</strong></label>
                                      <input type="text" name="gst_no" placeholder="GST No." class="form-control" value="<?php echo e(getFormEditValue($data,'gst_no')); ?>" required >  
                                      <?php if($errors->has('gst_no')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_no')); ?></p>
                                      <?php endif; ?>
                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                 <div class="form-group">
                                   <label class="mb-1"><strong>GST Certificate Document</strong></label>
                                   <input  class="form-control" type="file" name="gst_certificate" >
                                   <?php if($errors->has('gst_certificate')): ?>
                                       <p class="text-danger mpg_input_error"><?php echo e($errors->first('gst_certificate')); ?></p>
                                   <?php endif; ?>
                                   <?php if($data->gst_certificate): ?>
                                      <img src="<?php echo e(Storage::url(findImageIcon($data->gst_certificate))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                      <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$data->id,'gst'])); ?>">Download</a>
                                   <?php endif; ?>

                                 </div>
                             </div>
                             <div class="clearfix"></div>
                             <div class="col-md-6 required"> 
                                  <div class="form-group">
                                      <label class="mb-1"><strong>PAN  No.</strong></label>
                                      <input type="text" name="pan_no" value="<?php echo e(getFormEditValue($data,'pan_no')); ?>" placeholder="PAN  No." class="form-control" required>
                                      <?php if($errors->has('pan_no')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_no')); ?></p>
                                      <?php endif; ?>

                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>PAN  Card Document</strong></label>
                                      <input  class="form-control" type="file" name="pan_card" >
                                      <?php if($errors->has('pan_card')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('pan_card')); ?></p>
                                      <?php endif; ?>

                                       <?php if($data->pan_card): ?>
                                          <img src="<?php echo e(Storage::url(findImageIcon($data->pan_card))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                          <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$data->id,'pan'])); ?>">Download</a>
                                       <?php endif; ?>



                                </div>
                             </div>
                             <div class="clearfix"></div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>ID Proof</strong> </label>
                                      <select class="form-control" name="id_proof" required>
                                         <option value="" >Select Id Proof</option>
                                         <option value="driving_license" <?php if(getFormEditValue($data,'id_proof') == 'driving_license') { echo 'selected'; } ?>  >Driving License</option>
                                         <option value="adhaar_card" <?php if(getFormEditValue($data,'id_proof') == 'adhaar_card') { echo 'selected'; } ?>>Adhaar Card</option>
                                         <option value="passport" <?php if(getFormEditValue($data,'id_proof') == 'passport') { echo 'selected'; } ?>>Passport</option>
                                         <option value="voter_id_card" <?php if(getFormEditValue($data,'id_proof') == 'voter_id_card') { echo 'selected'; } ?>>Voter Id Card</option>
                                      </select>
                                      <?php if($errors->has('id_proof')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('id_proof')); ?></p>
                                      <?php endif; ?>
                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>ID Proof Document</strong></label>
                                      <input  class="form-control" type="file" name="id_proof_document" >
                                      <?php if($errors->has('id_proof_document')): ?>
                                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('id_proof_document')); ?></p>
                                      <?php endif; ?>

                                       <?php if($data->id_proof_document): ?>
                                          <img src="<?php echo e(Storage::url(findImageIcon($data->id_proof_document))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                          <a title="Download File" href="<?php echo e(route('admin_download_dealer_user_show',[$data->id,'id'])); ?>">Download</a>
                                       <?php endif; ?>
                                 </div>
                             </div>

                              
                           
                              
                              <div class="mb-3 col-md-6">
                                 <label class="form-label mb-1" id="status"><strong>Status</strong></label>
                                 <select class="default-select  form-control wide" name="status" required >
                                    <option value="" <?php if(getFormEditValue($data,'status') == ""): ?> selected <?php endif; ?>>Choose Status</option>
                                    <option value="active" <?php if(getFormEditValue($data,'status') == "active"): ?> selected <?php endif; ?>>Active</option>
                                    <option value="inactive" <?php if(getFormEditValue($data,'status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                                 </select>
                                 <?php if($errors->has('status')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(url(route('admin_dealer_user_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                              </div>
                              <div class="col-md-6">
                                
                              </div>
                        </div>
                           
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="user_id" value="<?php echo e($data->id); ?>">
               </form>   
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
               url:  '/admin/fetch_state_dealer',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_dealer_edit_state_loader').show();
               },
               complete: function(){
                   $('#ajax_dealer_edit_state_loader').hide();
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

      $("#country").select2();

    })
  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/dealer_user_edit.blade.php ENDPATH**/ ?>