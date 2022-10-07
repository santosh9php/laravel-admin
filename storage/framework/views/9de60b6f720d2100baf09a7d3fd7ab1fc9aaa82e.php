

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

<form action="<?php echo e(route('apply_coupon')); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_check(this);">
    <?php echo csrf_field(); ?>
           
    <div class="main-container container" id="cartContent">          
      
        <?php if(session('cart') && count(session('cart'))): ?>
      
           <table class="cart-table" id="cartContent_table">
                
                    <tr>
                        <th>Delete</th>
                        <th>Product Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="text-center">Subtotal</th>
                   </tr>
                

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

                           <tr data-id="<?php echo e($id); ?>">

                                 <td class="actions" data-th="">

                                   <button class="btn a_coupon btn-sm remove-from-cart" onclick="return cartUpdateOnDelete('<?php echo e($id); ?>')"><i class="fa fa-trash-o"></i></button>

                               </td>

                                <td>
                                    <a href="<?php echo e(route('product_detail',[$details['slug']])); ?>"><img src="<?php echo e(Storage::url($details['image'])); ?>" width="100" height="100" class="img-responsive"/></a>
                                </td>
                               <td data-th="Product">

                                   <h4 class="nomargin"><a href="<?php echo e(route('product_detail',[$details['slug']])); ?>"><?php echo e($details['name']); ?></a></h4>

                               </td>

                               <td data-th="Price"><?php echo e(siteCurrentcy().number_format($details['price'],2)); ?></td>

                               <td data-th="Quantity">
     

                                   <input class="form-control quantity update-cart qty_inp"  type="number" value="<?php echo e($details['quantity']); ?>" step="1" min="1"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="cartUpdateOnkeyup('<?php echo e($id); ?>')" onchange="cartUpdateOnchange('<?php echo e($id); ?>',this.value)" />
                                   
                                   <div class="clearfix"></div>

                               </td>

                               <td data-th="Subtotal" class="text-center"><?php echo e(siteCurrentcy().number_format(($details['price'] * $details['quantity']),2)); ?></td>

                              

                           </tr>

                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   <?php endif; ?>

          
                   <tr>

                       <td colspan="6" class="text_right">
                        <h3><strong>Sub Total : <?php echo e(siteCurrentcy().number_format($subtotal,2)); ?></strong></h3></td>

                   </tr>
                <?php if(Auth::check()): ?>
                 <tr>
                    <td colspan="2" class="text_right">
                         
                    </td>
                       <td colspan="4" class="text_right">
                                <strong>Apply the Coupon&nbsp;:&nbsp;</strong>
                                <div class="input-group btn-block" style="max-width:220px; float: right;">
                                  <input type="text" name="coupon_code" value="<?php if(session('coupon_code')): ?> <?php echo e(session('coupon_code')); ?> <?php else: ?> <?php echo e(old('coupon_code')); ?> <?php endif; ?>" size="1" class="form-control coupon_inp">
                                  

                                    <?php if(session('coupon_code')): ?>
                                        <span class="input-group-btn" style="padding-left:20px;">
                                          $nbsp;
                                          <button type="submit" data-toggle="tooltip" title="" class="btn a_coupon" data-original-title="Update" onclick="return check_coupon_status('remove');">Remove</button> 
                                        </span>
                                    <?php else: ?>

                                        <span class="input-group-btn" style="padding-left:20px;">
                                          <button type="submit" data-toggle="tooltip" title="" class="btn a_coupon" data-original-title="Update" onclick="return check_coupon_status('apply');">Apply</button> 
                                          </span>

                                    <?php endif; ?>


                                </div>
                                <?php $__errorArgs = ['coupon_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="form-group">
                                     <p class="text-danger mpg_top_error">Please enter the coupon code.</p>
                                  </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                      </td>

                   </tr>

                   <?php if(session('discount_amount')): ?>
                        <tr>

                           <td colspan="6" class="text_right">
                            <h3><strong>Discount : <?php echo e(siteCurrentcy().number_format(session('discount_amount'),2)); ?></strong></h3></td>

                        </tr>

                   <?php endif; ?>

                <?php endif; ?>

                    <?php if(session('discount_amount')): ?>
                        <tr>

                           <td colspan="6" class="text_right">
                            <h3><strong>Total : <?php echo e(siteCurrentcy().number_format(session('total_amount'),2)); ?></strong></h3></td>

                        </tr>

                    <?php else: ?>

                        <tr>

                           <td colspan="6" class="text_right">
                            <h3><strong>Total : <?php echo e(siteCurrentcy().number_format($total,2)); ?></strong></h3></td>

                        </tr>

                   <?php endif; ?>

                   

                   <tr>

                       <td colspan="6" class="text_right">

                            <a href="<?php echo e(route('home')); ?>" class="btn continue_shopping">
                              Continue Shopping</a>

                            <a href="<?php echo e(route('checkout')); ?>" class="btn checkout">Checkout</a>

                       </td>

                   </tr>

               

           </table>
        <?php else: ?>

            <table  id="cartContent_table">
                <tr><td colspan="6">
                    <div class="prodcut_not_found">
                       <img src="http://127.0.0.1:8000/frontend_assets/image/no_record_found.png" alt="imgpayment" class="img-1 img-responsive">
                       <h2 class="no_record_found">No Record Found.</h2> 
                   </div>
                </td></tr>
            </table>

        <?php endif; ?>

        

    </div>

    <input type="hidden" name="coupon_status" id="coupon_status" value="" >

</form>

<br><br>

<?php echo $__env->make('modal.add_tocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">

    function form_check(obj){
        if(obj.coupon_code.value == ''){

            alert("Please enter the coupon code");
            return false;
        }
    }

    function check_coupon_status(coupon_status){

        document.getElementById('coupon_status').value = coupon_status;

        return true;

    }

    function cartUpdateOnkeyup(e){
       // e.preventDefault();
        $('#cart_message').text();
        var ele = $(this);

        let code = event.keyCode || event.charCode;

        if(code >= 48 && code <= 57){

            $.ajax({

                url: '<?php echo e(route('update.cart')); ?>',
                method: "patch",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },

                beforeSend: function(){
                    $('#cart_update_loader').show();
                },
                complete: function(){
                    $('#cart_update_loader').hide();
                },
                success: function (data) {
                   //window.location.reload();
                    $('#cart_total_items').text(data.cart_total_items);
                    $('#cart_total_prices').text(data.cart_total_prices);
                    $('#cart_each_item').html(data.cart_each_item);
                    $('#cartContent').html(data.cartContent);
                    $('#addtocart_message').text(data.message);
                    $("#addtocart_modal").modal('show');
                }
            });        
           
        }

    }

    function cartUpdateOnchange(id,quantity){
       // e.preventDefault();
        $('#cart_message').text();
        $.ajax({
            url: '<?php echo e(route('update.cart')); ?>',
            method: "patch",
            data: {
                _token: '<?php echo e(csrf_token()); ?>', 
                id: id, 
                quantity: quantity
            },
            beforeSend: function(){
                $('#cart_update_loader').show();
            },
            complete: function(){
                $('#cart_update_loader').hide();
            },
            success: function (data) {
                //window.location.reload();
                $('#cart_total_items').text(data.cart_total_items);
                $('#cart_total_prices').text(data.cart_total_prices);
                $('#cart_each_item').html(data.cart_each_item);
                $('#cartContent').html(data.cartContent);
                
                 
                $('#addtocart_message').text(data.message);
                $("#addtocart_modal").modal('show');
            },
            error:function(requestObj, textStatus, errorThrown){
                console.log(requestObj);
                console.log(errorThrown);

            }
        });
    }

    function cartUpdateOnDelete(id){

        if(confirm("Are you sure to remove?")) {
            $.ajax({
                url: '<?php echo e(route('remove.from.cart')); ?>',
                method: "DELETE",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>', 
                    id: id
                },
                beforeSend: function(){
                    $('#cart_update_loader').show();
                },
                complete: function(){
                    $('#cart_update_loader').hide();
                },
                success: function (data) {
                    //window.location.reload();
                    $('#cart_total_items').text(data.cart_total_items);
                    $('#cart_total_prices').text(data.cart_total_prices);
                    $('#cart_each_item').html(data.cart_each_item);
                    $('#cartContent').html(data.cartContent);

                    $('#addtocart_message').text(data.message);
                    $("#addtocart_modal").modal('show');
                }
            });

             return false;
        } else {

            return false;
        }

        
    }

    /*

    $(document).ready(function(){

        $(".remove-from-cart").click(function (e) {

            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '<?php echo e(route('remove.from.cart')); ?>',
                    method: "DELETE",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    beforeSend: function(){
                        $('#cart_update_loader').show();
                    },
                    complete: function(){
                        $('#cart_update_loader').hide();
                    },
                    success: function (data) {
                        //window.location.reload();
                        $('#cart_total_items').text(data.cart_total_items);
                        $('#cart_total_prices').text(data.cart_total_prices);
                        $('#cart_each_item').html(data.cart_each_item);
                        $('#cartContent').html(data.cartContent);

                        $('#addtocart_message').text(data.message);
                        $("#addtocart_modal").modal('show');
                    }
                });
            }
        });

    })

    */
  

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/cart.blade.php ENDPATH**/ ?>