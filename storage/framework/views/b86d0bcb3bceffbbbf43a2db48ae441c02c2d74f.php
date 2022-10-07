 <div class="container">
         <div class="module extra-layout1">
            <div class="home_categories">
               <h2> Best  <span>Popular Products</span>  </h2>
            </div> 
            <div class="modcontent">
               <div id="so_extra_slider_12" class="so-extraslider button-type1">
                  <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="no" data-arrows="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="2" data-items_column3="1" data-items_column4="1" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                     <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="item">
                        <div class="product-layout product-grid">
                           <div class="item-inner product-layout transition product-grid">
                              <div class="product-item-container">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="<?php echo e(route('product_detail',[$product->slug])); ?>" target="_self" title="<?php echo e($product->name); ?>">

                                       <?php
                                          $images = json_decode($product->images,true);
                                          if(is_array($images)){
                                             $image_show='n';
                                             foreach($images as $image){
                                                if(Storage::exists($image)){
                                       ?>
                                          <img src="<?php echo e(Storage::url(findMTPath($image))); ?>"  class="img-1 img-responsive" alt="<?php echo e($product->image_attr); ?>"> 
                                          
                                       <?php
                                             $image_show='y';
                                             break;
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
                                    <!--
                                    <div class="button-group cartinfo--static">                                                
                                       <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i></button>
                                       <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                       <span>Add to cart </span>   
                                       </button>
                                       <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i></button>                                                    
                                    </div>
                                 -->
                                 
                                    <h4><a href="<?php echo e(route('product_detail',[$product->slug])); ?>" title="<?php echo e($product->name); ?>" target="_self"><?php echo e(showProductName($product->name,50)); ?></a></h4>

                                    <!--
                                    <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    </div>
                                 -->

                                    <div class="price">
                                        <?php
                                          $price = showProductPrice($product->regular_price, $product->sale_price);
                                          echo $price;
                                       ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home/best_popular_products.blade.php ENDPATH**/ ?>