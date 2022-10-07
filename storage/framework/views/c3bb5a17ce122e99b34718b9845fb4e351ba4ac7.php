 <div class="row-cates">
      <div class="container">
         <div class="module listingtab-layout6">
            <div class="home_categories">
               <h2 class="mb-25"  style="margin-top:0 !important;"> Recent  <span> Products</span>  </h2>
            </div>
            
             <div class="col-md-12">

             
                <div class="modcontent">
               <div id="so_listing_tabs_3" class="so-listing-tabs first-load">
                  <div class="loadeding"></div>
                  <div class="ltabs-wrap">
                     <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="4" data-sm="3" data-xs="1" data-margin="30" >
                        <!--Begin Tabs-->
                        <div class="ltabs-tabs-wrap" style="display:none;">
                           <span class="ltabs-tab-selected"> </span> <span class="ltabs-tab-arrow">▼</span>
                           <div class="item-sub-cat">
                              <ul class="ltabs-tabs cf">
                                 <li class="ltabs-tab tab-sel" data-category-id="31" data-active-content=".items-category-31"> <span class="ltabs-tab-label"></span> </li>
                                 <li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label"></span> </li>
                                 <li class="ltabs-tab " data-category-id="25" data-active-content=".items-category-25"> <span class="ltabs-tab-label"></span> </li>
                              </ul>
                           </div>
                        </div>
                        <!-- End Tabs-->
                     </div>
                     <div class="wap-listing-tabs products-list grid">
                        <div class="ltabs-items-container">
                           <!--Begin Items-->
                           <div class="ltabs-items ltabs-items-selected items-category-31" data-total="16">
                              <div class="ltabs-items-inner">
                                 <?php $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                 <div class="item">
                                    <div class="product-layout product-grid">
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
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
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
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 
                              </div>
                           </div>
                           <div class="ltabs-items items-category-18 grid" data-total="16">
                              <div class="ltabs-loading"></div>
                           </div>
                           <div class="ltabs-items  items-category-25 grid" data-total="16">
                              <div class="ltabs-loading"></div>
                           </div>
                           <!--End Items-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>

                     
                  
             </div>
         </div>
      </div>
   </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home/recent_products.blade.php ENDPATH**/ ?>