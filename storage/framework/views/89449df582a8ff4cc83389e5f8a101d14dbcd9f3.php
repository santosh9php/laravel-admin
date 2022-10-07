


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Assign Coupon to dealers</h4>
            </div>
         </div>
         
      </div>
      
      <?php if(Session::has('success') || Session::has('error')): ?>

      <div class="row page-titles mx-0 mb-0">
         <div class="col-sm-12 p-md-0">
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



      <div class="col-lg-12" id="coupon_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_post_assign_show')); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_check();" >
                  <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <div class="basic-form">
                           <div class="row">
                              <div class="mb-3 col-md-3">

                                       <div class="row">

                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Discount Types</label>
                                             <div style="font-weight:bold;">
                                                <?php if($coupon->discount_type == 'cart_discount'): ?>
                                                   Cart Fixed Discount
                                                <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                                   Cart % Discount
                                                <?php endif; ?>
                                            </div>
                                          </div>

                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Coupon Amount</label>
                                             <div style="font-weight:bold;">

                                                <?php if($coupon->discount_type == 'cart_discount'): ?>
                                                   <?php echo e($coupon->coupon_amount); ?>

                                                <?php elseif($coupon->discount_type == 'cart_per_discount'): ?>
                                                   <?php echo e($coupon->coupon_amount); ?> %
                                                <?php endif; ?>

                                             </div>
                                             
                                          </div>
                                       
                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Coupon Code</label>
                                             <div style="font-weight:bold;"><?php echo e($coupon->coupon_code); ?></div>
                                             
                                          </div>
                                          
                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Coupon Usage Limit</label>
                                             <div style="font-weight:bold;"><?php echo e($coupon->coupon_usages_limit); ?></div>
                                          </div>
                                        
                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Minimum Purchase Limit</label>
                                            <diV style="font-weight:bold;"><?php echo e($coupon->minimum_purchase_limit); ?></div>
                                          </div>
                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Description</label>
                                             <div style="font-weight:bold;"><?php echo e($coupon->description); ?></div>
                                          </div>

                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Coupon Start Date</label>
                                            <diV style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_start_date)); ?></div>
                                          </div>
                                          <div class="mb-3 col-md-12">
                                             <label class="form-label">Coupon Expiry Date</label>
                                             <div style="font-weight:bold;"><?php echo e(date('j F, Y',$coupon->coupon_expiry_date)); ?></div>
                                          </div>

                                          <div class="col-md-12">&nbsp;</div>

                                          <div class="col-md-12">&nbsp;</div>


                                          <div class="col-md-12">
                                             <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(url(route('admin_coupon_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                                       
                                          </div>

                                       </diV>

                              </div>

                              <div class="mb-3 col-md-9" style="overflow-y: scroll; height:700px;">
                                 <div id="ajax_coupon_state_loader"></div>
                                 <div class="row">
                                    <div class="mb-3 col-md-6">
                                       
                                       <div class="clearfix"></div>
                                       <input class="form-check-input" type="checkbox"  value="all" name="all_users" id="all_users" >&nbsp; All active dealers
                                       <?php if($errors->has('all_users')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('all_users')); ?></p>
                                       <?php endif; ?>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Choose Dealers</label>
                                       <select class=" form-control wide " name="select_user_id[]" id="select_user_id" multiple  >
                                          <option value="" >Select Dealers</option>
                                             <?php if($users): ?>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($user->id); ?>" <?php if(old('select_user_id') == $user->id): ?> selected <?php endif; ?>><?php echo e($user->fname); ?>&nbsp;<?php echo e($user->lname); ?></option>
                                                  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>
                                       </select>
                                    </div>
                                    
                                 </div>

                                 <div class="row">

                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Choose Dealers By Country</label>
                                       <select class=" form-control wide " name="country" id="country" onchange="show_state(this.value)" >
                                          <option value="" >Select Country</option>
                                             <?php if($countries): ?>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               
                                                   <option value="<?php echo e($country->country); ?>" <?php if(old('country') == $country->country): ?> selected <?php endif; ?>><?php echo e($country->country); ?></option>
                                                  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>
                                       </select>
                                    </div>

                                     <div class="mb-3 col-md-6">
                                       <label class="form-label">Choose Dealers By Country & State </label>
                                       <div id="country_state">
                                          <select class=" form-control wide " name="state[]" id="state" multiple >
                                             <option value="" >Select State</option>
                                          </select>
                                       </div>
                                    </div>


                                 </div>

                                 <div class="row">

                                    <div class="mb-3 col-md-12" >
                                       <div class="table-responsive" style="border:1px solid #eee">
                                          <table class="table table-responsive-md table-bordered table-striped ">
                                             <thead>
                                                <tr>
                                                   <th class="check">
                                                      <input class="form-check-input" type="checkbox" name="user_all_check" id="user_all_check" value="all"  >
                                                   </th>
                                                   <th class="sno"><strong>S No.</strong></th>
                                                   <th ><strong>Name</strong></th>
                                                   <th ><strong>Email Id</strong></th>
                                                   <th class="create_date" style="width:300px;"><strong>Company Name</strong></th>
                                                   <th class="mobile" style="width:80px;"><strong>C Code</strong></th>
                                                   <th class="mobile" style="width:150px;"><strong>Mobile No.</strong></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php 
                                                   session(['user_counter' => 1]);
                                                ?>
                                                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                   <tr>
                                                      <td>

                                                       <div class="form-check">
                                                              <input class="form-check-input user_check" type="checkbox" name="user_ids[]" id="user_ids" value="<?php echo e($user->id); ?>"  >
                                                        </div>

                                                      
                                                      </td>
                                                      <td style="text-align:center;">

                                                         <?php echo e(session('user_counter')); ?>

                                                         <?php 
                                                            session(['user_counter' => session('user_counter')+1]);
                                                         ?>
                                                      </td>
                                                      <td>
                                                         <div class="d-flex align-items-center"><?php echo e($user->fname." ".$user->lname); ?></div>
                                                      </td>
                                                      <td ><?php echo e($user->email); ?></td>

                                                      <td style="text-align:center;"><?php echo e($user->company_name); ?></td>

                                                      <td style="text-align:center;"><?php echo e($user->country_code); ?></td>

                                                      <td style="text-align:center;"><?php echo e($user->mobile); ?></td>

                                                 </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                

                                             </tbody>
                                          </table>
                                       </div>

                                    </div>


                           </div> 

                              </div>
                           

                     <input type="hidden" name="coupon_id" value="<?php echo e($coupon->id); ?>">
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

   function form_check(){
     

   }

    function show_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_coupon',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_coupon_state_loader').show();
               },
               complete: function(){
                   $('#ajax_coupon_state_loader').hide();
               },
               success: function (data) {
                  //console.log(data);
                  $('#country_state').html(data.state);
                  $('#state').select2();

               },
               error: function (requestObj, textStatus, errorThrown) {
                   console.log(requestObj);
               },
           });
        }
    }

   $(document).ready(function(){

      $("#select_user_id").select2();

      $("#country").select2();

      $("#state").select2();

      //For all users check and uncheck

      $('#user_all_check').click(function() {

          $('.user_check').prop('checked', this.checked); 

      });

      $('#all_users').click(function() {
         if(this.checked == true){
            $('#user_all_check').prop('checked', false); 
            $('.user_check').prop('checked', false); 
            $("#select_user_id").val('');
            $("#select_user_id").trigger("change.select2");

            $("#country").val('');
            $("#country").trigger("change.select2");

            $("#state").val('');
            $("#state").trigger("change.select2");
         }

      });

     //End of all users check and uncheck
   })

     
   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/coupon_assign.blade.php ENDPATH**/ ?>