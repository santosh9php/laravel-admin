

<?php $__env->startSection('body-content'); ?>

<div class="title_background">
   <h2><?php if($breadcrums): ?><?php echo e($breadcrums); ?><?php endif; ?></h2>
</div>

<div class="main-container ">
    <div class="container">
        <div id="content" class="col-sm-12">
            <div class="about-us about-demo-3"> 
                    <div class="row"> 

                    <?php
                        
                        $user = Auth::user();
                        $user_id = $user->id;
                        $todays = time();
                        if($coupons){
                            foreach($coupons as $coupon){

                                $disable='';

                                $rem_coupon = 0;

                                $discount_type = $coupon->discount_type;

                                $coupon_amount = $coupon->coupon_amount;

                                if($discount_type == 'cart_discount'){

                                    $coupon_amount = siteCurrentcy().$coupon_amount;

                                } else if($discount_type == 'cart_per_discount'){

                                    $coupon_amount = $coupon_amount.'%';
                                    
                                }

                                $couponAttrs = $coupon->attributes;

                                $used_no = findUsedNo($couponAttrs,$user_id);

                                $rem_coupon = $coupon->coupon_usages_limit - $used_no;

                                if($coupon->coupon_expiry_date < $todays){

                                    $disable='disable';

                                }

                                $used_no_plu ='';
                                $rem_coupon_plu = '';

                                if($used_no > 0) $used_no_plu ='s';
                                if($rem_coupon > 0) $rem_coupon_plu ='s';

                    ?>

                                <div class="col-md-3"> 
                                    <div class="coupon_box <?php echo e($disable); ?>">
                                        <div class="offer">
                                             <h2> Save <br><span> <?php echo e($coupon_amount); ?> off</span> </h2> 
                                        </div>
                                        <div class="text"> 
                                            <p><b> Coupon Code : <?php echo e($coupon->coupon_code); ?></b></p>
                                            <p><b>Used <?php echo e($used_no); ?> Coupon<?php echo e($used_no_plu); ?></b> <b> Remaining  <?php echo e($rem_coupon); ?> Coupon<?php echo e($rem_coupon_plu); ?></b></p> 
                                            <p>Minimum Purchase Order: <b> <?php echo e(siteCurrentcy().$coupon->minimum_purchase_limit); ?>/-</b></p>
                                            <p>Date: <b> <?php echo e(date('j M, Y',$coupon->coupon_start_date)); ?></b> to <b> <?php echo e(date('j M, Y',$coupon->coupon_expiry_date)); ?></b></p>    
                                        </div>
                                    </div> 
                                </div>
                    <?php

                            }
                        }

                    ?>  

                    <?php if(count($coupons) == 0): ?>

                       <div class="prodcut_not_found">
                           <img src="<?php echo e(asset('frontend_assets/image/no_record_found.png')); ?>" alt="imgpayment" class="img-1 img-responsive">
                           <h2 class="no_record_found">No Record Found.</h2> 
                       </div>

                    <?php endif; ?>
 
                        
                    </div>
            </div>
        </div>
    </div>
</div>
<br> <br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/coupon_list.blade.php ENDPATH**/ ?>