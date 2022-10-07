

<?php $__env->startSection('body-content'); ?>

<br><br>

<div class="heading_register">
      <h2 class="title"><?php if($breadcrums): ?><?php echo e($breadcrums); ?><?php endif; ?></h2>  
</div>


<div id="cart_update_loader"> </div>
           
<div class="main-container container" id="wishlistContent">          
  
    <?php if($wishlists && count($wishlists)): ?>
  
       <table class="cart-table" id="wishlistContent_table" border="0">
            
                <tr>
                    <th class="wish_del">Delete</th>
                    <th class="wish_img">Product Image</th>
                    <th >Product</th>
                    <th class="wish_price">Price</th>
                    <th class="wish_add_to_cart">Add to cart</th>
               </tr>
              
               <?php if($wishlists): ?>

                   <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       <tr data-id="<?php echo e($wishlist->id); ?>">

                            <td class="actions" data-th="">

                               <button class="btn a_coupon btn-sm remove-from-cart" onclick="wishlistUpdateOnDelete('<?php echo e($wishlist->id); ?>')"><i class="fa fa-trash-o"></i></button>

                            </td>

                            <td>
                                <a href="<?php echo e(route('product_detail',[$wishlist->product->slug])); ?>">

                                    


                                    <?php
                                        $images = json_decode($wishlist->product->images,true);
                                        if(is_array($images)){
                                            foreach($images as $image){
                                                if(Storage::exists($image)){
                                    ?>
                                                    <img src="<?php echo e(Storage::url(findMTPath($image))); ?>" width="100" height="100" class="img-responsive"/>
                                    <?php
                                        break;
                                           }
                                        }
                                    }
                                    ?>

                                </a>
                            </td>
                           <td data-th="Product">

                               <h4 class="nomargin">
                                    <a href="<?php echo e(route('product_detail',[$wishlist->product->slug])); ?>">
                                        <?php echo e($wishlist->product->name); ?>

                                    </a>
                                </h4>

                           </td>

                           <td data-th="Price"><?php echo e(siteCurrentcy().number_format($wishlist->product->sale_price,2)); ?></td>

                           <td data-th="">
                                <button class="btn a_coupon btn-sm add-to-wishlist" onclick="addToCart('<?php echo e($wishlist->id); ?>','<?php echo e($wishlist->product->id); ?>')">Add to cart</button>
                           </td>

                       </tr>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               <?php endif; ?>

       </table>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>" />

    <?php else: ?>

        <table  id="cartContent_table">
            <tr><td colspan="5">
                <div class="prodcut_not_found">
                   <img src="http://127.0.0.1:8000/frontend_assets/image/no_record_found.png" alt="imgpayment" class="img-1 img-responsive">
                   <h2 class="no_record_found">No Record Found.</h2> 
               </div>
            </td></tr>
        </table>

    <?php endif; ?>


</div>

<br><br>

<?php echo $__env->make('modal.add_tocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('modal.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">

    function addToCart(id,product_id){
        

        $.ajax({
                type: 'GET',
                url:  '/add-to-cart',
                dataType: 'json',
                data:{'product_id':product_id,'quantity':1, _token: '<?php echo e(csrf_token()); ?>'},
                beforeSend: function(){
                    $('#addtocart_loader').show();
                },
                complete: function(){
                    $('#addtocart_loader').hide();
                },
                success: function (data) {
                   //console.log(data);
                  // alert(data.message);
                   $('#cart_total_items').text(data.cart_total_items);
                   $('#cart_total_prices').text(data.cart_total_prices);
                   $('#cart_each_item').html(data.cart_each_item);
                   $('#addtocart_message').text(data.message);
                   $("#addtocart_modal").modal('show');

                    let user_id = $('#user_id').val();
                    $.ajax({
                        url: '<?php echo e(route('remove-from-wishlist')); ?>',
                        method: "DELETE",
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>', 
                            id: id,
                            'user_id':user_id,
                        },
                        beforeSend: function(){
                            $('#cart_update_loader').show();
                        },
                        complete: function(){
                            $('#cart_update_loader').hide();
                        },
                        success: function (data) {
                            //window.location.reload();
                            $('#wishlist-total').prop('title', data.totalRecord);
                            $('#wishlistContent').html(data.wishlistContent);
                        }
                    });
                              
                },
                error: function (requestObj, textStatus, errorThrown) {
                    console.log(requestObj);
                    //alert(requestObj.message);
                    $('#addtocart_message').text('Some issue occured.');
                    $('#addtocart_modal').modal('show');
                },
            });
    }

    function wishlistUpdateOnDelete(id){

        let user_id = $('#user_id').val();

        if(confirm("Are you sure to remove?")) {
            $.ajax({
                url: '<?php echo e(route('remove-from-wishlist')); ?>',
                method: "DELETE",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>', 
                    id: id,
                    'user_id':user_id,
                },
                beforeSend: function(){
                    $('#cart_update_loader').show();
                },
                complete: function(){
                    $('#cart_update_loader').hide();
                },
                success: function (data) {
                    //window.location.reload();
                    console.log(data);
                    $('#wishlist-total').prop('title', data.totalRecord);
                    $('#wishlistContent').html(data.wishlistContent);
                    $('#wishlist_message').text(data.message);
                    $("#wishlist_modal").modal('show');
                       
                }
            });
        }
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/wishlist.blade.php ENDPATH**/ ?>