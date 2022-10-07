

<div class="recent_background">
    <div class="container">
             <div class="related titleLine products-list grid module ">
                <h3 class="modtitle">  </h3>

                    <div class="recent_products">
                        <h2><span>Related </span> Products </h2>
                    </div>



                <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">

                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="product-layout product-grid mt-25">                                               
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container second_img">
                                        <a href="<?php echo e(route('product_detail',[$product->slug])); ?>" target="_self" title="<?php echo e($product->name); ?>">
                                            <?php
                                               $images = json_decode($product->images,true);
                                               if(is_array($images)){
                                                $i=1;
                                                $image_show='n';
                                                  foreach($images as $image){
                                                     if(Storage::exists($image)){
                                            ?>
                                               <img src="<?php echo e(Storage::url(findMTPath($image))); ?>" class="img-<?php echo e($i); ?> img-responsive" alt="<?php echo e($product->image_attr); ?>"> 
                                   
                                            <?php
                                                        $image_show='y';  
                                                        if($i == 2)break;
                                                        $i++;
                                                    }

                                                  }
                                               }
                                            if($image_show=='n'){
                                            ?>
                                                    <img src="<?php echo e(Storage::url('media/product/default/productDefaultImage.webp')); ?>" class="img-1 img-responsive" alt="" />
                                           <?php
                                           }
                                           ?>
                                        </a>

                                        <?php
                                           $discount = showProductDiscount($product->regular_price, $product->sale_price);
                                           echo $discount;
                                        ?>

                                    </div>
                                    <?php
                                        $new = showNewOnProduct($product->created_at);
                                        echo $new;
                                    ?>
                                    <div class="product_partno"><?php echo e($product->part_no); ?></div>
                                </div>
                                <div class="right-block">
                        
                                    <h4><a href="<?php echo e(route('product_detail',[$product->slug])); ?>" title="<?php echo e($product->name); ?>" target="_self"><?php echo e(showProductName($product->name,50)); ?></a></h4>
                        
                                    <div class="price">
                                       <?php
                                           $price = showProductPrice($product->regular_price, $product->sale_price);
                                           echo $price;
                                        ?>
                                    </div>
                                </div>                                            
                            </div>                                            
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            
                </div>
            </div>
            <br /><br />
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/relatedProducts.blade.php ENDPATH**/ ?>