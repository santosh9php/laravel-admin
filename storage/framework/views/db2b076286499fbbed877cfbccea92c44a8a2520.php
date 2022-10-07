<?php
//session()->flush();
$cart_total_items = 0;
$cart_total_prices = 0;
$cart_subtotal_prices = 0;
$cart = session()->get('cart', []);
$cart_total_items = count($cart);
if(session('cart') && is_array(session('cart'))){
    foreach(session('cart') as $id => $details)
    {

        $cart_product = \App\Models\Admin\Product::findOrFail($id);

        $cart_subtotal_prices += $details['price'] * $details['quantity'];

        $cart_total_prices += $details['price'] * $details['quantity'];
    }
}

?>

<div class="shopping_cart">
    <div id="cart" class="btn-shopping-cart">
        <a href="javascript:void(0)" data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <div class="shopcart">
                <span class="icon-c">
                    <i class="fa fa-shopping-basket"></i>
                </span>
                <div class="shopcart-inner">
                    <p class="text-shopping-cart">
                        My cart
                    </p>
                    <span class="total-shopping-cart cart-total-full">
                        <span class="items_cart" id="cart_total_items"><?php echo e($cart_total_items); ?></span><span class="items_cart2"> item(s)</span><span class="items_carts" id="cart_total_prices"><?php echo e(siteCurrentcy()); ?><?php echo e(number_format($cart_total_prices,2)); ?></span>
                    </span>
                </div>
            </div>
        </a>
        <ul class="dropdown-menu pull-right shoppingcart-box" role="menu" id="cart_each_item">
            <li>
                <table class="table table-striped">
                    <tbody>
                        <?php if(session('cart')): ?>
                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center" style="width:70px">
                                        <a href="<?php echo e(route('product_detail',[$cart_product->slug])); ?>">
                                            <img src="<?php echo e(Storage::url($details['image'])); ?>" style="width:70px" alt="<?php echo e($cart_product->image_attr); ?>" title="<?php echo e($cart_product->name); ?>" class="preview">
                                        </a>
                                    </td>
                                    <td class="text-left">
                                        <a class="cart_product_name" href="<?php echo e(route('product_detail',[$cart_product->slug])); ?>"><?php echo e(showProductName($cart_product->name,30)); ?></a>
                                    </td>
                                    <td class="text-right"><?php echo e(siteCurrentcy().number_format($details['price'],2).'x'.$details['quantity']); ?></td>
                                    <td class="text-right"><?php echo e(siteCurrentcy().number_format(($details['price']*$details['quantity']),2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                    </tbody>
                </table>
            </li>
            <li>
                <div>
                    <table class="table table-bordered">
                        <tbody>
                            <?php if($cart_total_items): ?>  
                                <tr>
                                    <td class="text-left">
                                        <strong>Sub-Total</strong>
                                    </td>
                                    <td class="text-right"><?php echo e(siteCurrentcy()); ?><?php echo e(number_format($cart_subtotal_prices,2)); ?></td>
                                </tr>

                                <?php if(session('discount_amount')): ?>

                                    <tr>
                                        <td class="text-left">
                                            <strong>Discount</strong>
                                        </td>
                                        <td class="text-right"><?php echo e(siteCurrentcy().number_format(session('discount_amount'),2)); ?></td>
                                    </tr>

                                <?php endif; ?>

                                <?php if(session('total_amount')): ?>

                                    <tr>
                                        <td class="text-left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="text-right"><?php echo e(siteCurrentcy().number_format(session('total_amount'),2)); ?></td>
                                    </tr>

                                <?php else: ?>
                                
                                    <tr>
                                        <td class="text-left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="text-right"><?php echo e(siteCurrentcy()); ?><?php echo e(number_format($cart_total_prices,2)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    
                        
                    <?php if($cart_total_items): ?>
                        <p class="text-right">   
                            <a class="btn view-cart" href="<?php echo e(route('cart')); ?>"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; 
                            <a class="btn btn-mega checkout-cart" href="<?php echo e(route('checkout')); ?>"><i class="fa fa-share"></i>Checkout</a>
                        </p>
                    <?php else: ?>
                        <p class="text-center">
                            No product in th cart
                        </p>
                    <?php endif; ?>
                   
                </div>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/common/shoppingCart.blade.php ENDPATH**/ ?>