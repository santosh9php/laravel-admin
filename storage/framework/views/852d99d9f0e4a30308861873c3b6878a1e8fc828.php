

<?php $__env->startSection('body-content'); ?>

<br><br>

<div class="heading_register">
      <h2 class="title"><?php if($breadcrums): ?><?php echo e($breadcrums); ?><?php endif; ?></h2>  
</div>


<div id="cart_update_loader"> </div>

<div class="main-container container">

    <div class="col-lg-12"> 
        <?php if(Session::has('success')): ?> 
            <p class="alert alert-success text-center"><?php echo Session::get('success'); ?></p> 
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            <p class="alert alert-danger  text-center"><?php echo e(Session::get('error')); ?></p>
        <?php endif; ?>
    </div> 

</div>    
           
<div class="main-container container">
    <div class="row">
        <div id="ajax_state_loader"> </div>
        <form action="<?php echo e(route('order')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" onsubmit="return form_check(this);">
            <?php echo csrf_field(); ?>
            <fieldset id="account">
               
                <div class="col-md-8">
                    <div class="col-md-12">
                        <h2 class="checkout_heading"> BILLING DETAILS</h2>
                    </div>
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" name="b_fname" id="b_fname" value="<?php echo e(old('b_fname')); ?>" class="form-control" required />
                        <?php if($errors->has('b_fname')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_fname')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="b_lname" id="b_lname" value="<?php echo e(old('b_lname')); ?>" class="form-control" required />
                         <?php if($errors->has('b_lname')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_lname')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-6">
                        <label>Country</label>

                        <select class="default-select form-control wide" name="b_country" id="b_country" onchange="show_bill_state(this.value)" required >
                            <option value="">Select Country</option>
                            <?php if($countries): ?>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('b_country') == $country->name): ?> selected <?php endif; ?> value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('b_country')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_country')); ?></p>
                        <?php endif; ?>
                    </div> 

                    <div class="col-md-6">
                        <label>State</label>
                        <div id="billing_state">
                            <input type="text" name="b_state" id="b_state" value="<?php echo e(old('b_state')); ?>" class="form-control" required />
                        </div>
                        <?php if($errors->has('b_state')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_state')); ?></p>
                        <?php endif; ?>
                    </div> 
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <label>Address</label>
                        <textarea  class="form-control" placeholder="" name="b_address" id="b_address" required><?php echo e(old('b_address')); ?></textarea>
                        <?php if($errors->has('b_address')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_address')); ?></p>
                        <?php endif; ?>
                    </div>   

                    <div class="clearfix"></div>                  
                   
                    <div class="col-md-6">
                        <label>PIN Code </label>
                        <input type="number" class="form-control" placeholder="" name="b_pincode" id="b_pincode" value="<?php echo e(old('b_pincode')); ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" required>
                        <?php if($errors->has('b_pincode')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_pincode')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label>Phone Number </label>
                        <input type="number" class="form-control" placeholder="" name="b_phone" id="b_phone" value="<?php echo e(old('b_phone')); ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>
                        <?php if($errors->has('b_phone')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('b_phone')); ?></p>
                        <?php endif; ?>
                    </div>
                  
                    <div class="clearfix"></div>
                    <br />

                    <div class="col-md-12">
                        <label class="check_box">
                           
                            <input type="checkbox" name="same_address" id="same_address" value="same"   /> &nbsp; Shipping address is same as billing address
                        </label>
                    </div>

                    <div class="clearfix"></div>

                    <br />
                    <br />

                    <div class="col-md-12">
                        <h2 class="checkout_heading"> SHIPPING  DETAILS</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" name="s_fname" id="s_fname" value="<?php echo e(old('s_fname')); ?>" class="form-control" required />
                        <?php if($errors->has('s_fname')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_fname')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="s_lname" id="s_lname" value="<?php echo e(old('s_lname')); ?>" class="form-control" required />
                         <?php if($errors->has('s_lname')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_lname')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-6">
                        <label>Country</label>

                        <select class="default-select form-control wide" name="s_country" id="s_country" onchange="show_shipp_state(this.value)" required >
                            <option value="">Select Country</option>
                            <?php if($countries): ?>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('s_country') == $country->name): ?> selected <?php endif; ?> value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('s_country')): ?>
                          <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_country')); ?></p>
                        <?php endif; ?>
                    </div> 

                    <div class="col-md-6">
                        <label>State</label>
                        <div id="shipping_state">
                            <input type="text" name="s_state" id="s_state" value="<?php echo e(old('s_state')); ?>" class="form-control" required />
                        </div>
                        <?php if($errors->has('s_state')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_state')); ?></p>
                        <?php endif; ?>
                    </div> 
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <label>Address</label>
                        <textarea  class="form-control" placeholder="" name="s_address" id="s_address" required><?php echo e(old('s_address')); ?></textarea>
                        <?php if($errors->has('s_address')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_address')); ?></p>
                        <?php endif; ?>
                    </div>                     
                   <div class="clearfix"></div>
                    <div class="col-md-6">
                        <label>PIN Code </label>
                        <input type="number" class="form-control" placeholder="" name="s_pincode" id="s_pincode" value="<?php echo e(old('s_pincode')); ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" required>
                        <?php if($errors->has('s_pincode')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_pincode')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label>Phone Number </label>
                        <input type="number" class="form-control" placeholder="" name="s_phone" id="s_phone" value="<?php echo e(old('s_phone')); ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>
                        <?php if($errors->has('s_phone')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('s_phone')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="clearfix"></div>

                </div>

                <div class="col-md-4">
                    <div class="checkout_area">
                        <h2 class="checkout_heading">YOUR ORDER</h2>
                        <div class="custom_table">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <th align="left" valign="top">Products</th>
                                        <th align="right" valign="top">Subtotal</th>
                                    </tr>

                                <?php if(session('cart') && count(session('cart'))): ?>

                                    <?php 
                                        $total = 0; 
                                        $subtotal = 0;
                                    ?>
                                    <?php if(session('cart')): ?>

                                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php 
                                                $subtotal += $details['price'] * $details['quantity']; 
                                                $total += $details['price'] * $details['quantity']; 

                                                
                                            ?>
                                        <tr>
                                            <td align="left" valign="top"> <?php echo e($details['name']); ?>&nbsp; × &nbsp;<?php echo e($details['quantity']); ?> </td>
                                            <td align="right" valign="top"> <?php echo e(siteCurrentcy().number_format(($details['price'] * $details['quantity']),2)); ?> </td>
                                        </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>
                                    <tr>
                                        <td align="left" valign="top">Subtotal</td>
                                        <td align="right" valign="top"><?php echo e(siteCurrentcy().number_format($subtotal,2)); ?></td>
                                    </tr>

                                    <?php if(session('discount_amount')): ?>
                                        <tr>
                                            <td align="left" valign="top">Discount</td>
                                            <td align="right" valign="top"><strong> <?php echo e(siteCurrentcy().number_format(session('discount_amount'),2)); ?></strong></td>
                                        </tr>

                                    <?php endif; ?>

                                    <?php if(session('discount_amount')): ?>

                                        <tr>
                                            <td align="left" valign="top">Total</td>
                                            <td align="right" valign="top"><strong> <?php echo e(siteCurrentcy().number_format(session('total_amount'),2)); ?></strong></td>
                                        </tr>


                                    <?php else: ?>
                                    
                                        <tr>
                                            <td align="left" valign="top">Total</td>
                                            <td align="right" valign="top"><strong><?php echo e(siteCurrentcy().number_format($total,2)); ?></strong></td>
                                        </tr>

                                    <?php endif; ?>


                                <?php endif; ?>
                                </tbody>
                            </table>
                            <br />
                            <h2 class="black">Payment Option</h2>
                           
                            <p>
                            <input type="radio" name="payment_method" value="cash_on_delivery" checked="checked" /> &nbsp; Cash on Delivery
                            </p>

                                <br />
                            <button class="checkout full_width">Place Order</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<br><br>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">

    $(document).ready(function(){
        $("#same_address").click(function(){
            if(this.checked == true){

                $("#s_fname").val($("#b_fname").val());
                $("#s_lname").val($("#b_lname").val());
                $("#s_country").val($("#b_country").val());
                $("#s_state").val($("#b_state").val());
                $("#s_address").val($("#b_address").val());
                $("#s_pincode").val($("#b_pincode").val());
                $("#s_phone").val($("#b_phone").val());
                
            }


        })
    });

    function form_check(obj){
        if(obj.coupon_code.value == ''){

            alert("Please enter the coupon code");
            return false;
        }
    }

    

    function show_shipp_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/fetch_shipp_state',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_state_loader').show();
               },
               complete: function(){
                   $('#ajax_state_loader').hide();
               },
               success: function (data) {
                  console.log(data);
                  $('#shipping_state').html(data.state);
               },
               error: function (requestObj, textStatus, errorThrown) {
                   console.log(requestObj);
               },
           });
        }
    }

    function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/fetch_state',
               dataType: 'json',
               data:{'country':country,_token: '<?php echo e(csrf_token()); ?>'},
               beforeSend: function(){
                   $('#ajax_state_loader').show();
               },
               complete: function(){
                   $('#ajax_state_loader').hide();
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

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/checkout.blade.php ENDPATH**/ ?>