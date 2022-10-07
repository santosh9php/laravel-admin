

<?php $__env->startSection('body-content'); ?>

 
     <?php if($category_name or $breadcrum ): ?> 
            <div class="title_background">
               <h2><?php echo e($category_name); ?></h2>
               <div class="navigator"><?php echo $breadcrum; ?></div>
            </div> 
   <?php endif; ?>


 

<div class="main-container container">
   <!--
   <ul class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#"><?php echo $breadcrum; ?></a></li>
   </ul>
-->
   <div class="row">
      <div id="content" class="col-md-12">
         <div class="products-category">
       
            
            <div class="products-list row nopadding-xs so-filter-gird">

               <?php if(count($subCategories) == 0 && count($products) == 0): ?>

               <div class="prodcut_not_found">
                   <img src="<?php echo e(asset('frontend_assets/image/no_record_found.png')); ?>" alt="imgpayment" class="img-1 img-responsive">
                   <h2 class="no_record_found">No Record Found.</h2> 
               </div>

               <?php endif; ?>

               <div class="clearfix"></div>
               <?php $i = 1; ?>
               <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="product-item-container">
                        <div class="left-block">
                           <div class="product-image-container second_img">
                              <a  href="<?php echo e(route('segment_product_search',[$category->slug])); ?>" target="_self" title="<?php echo e($category->name); ?> ">
                                 
                              </a>
                           </div> 
                           
                        </div>
                        <div class="right-block">
                           <h4><a class="vehicle_name" href="<?php echo e(route('segment_product_search',[$category->slug])); ?>" title="<?php echo e($category->name); ?> " target="_self"><?php echo e($category->name); ?></a></h4>

                              <a class="view_product view_device" href="<?php echo e(route('segment_product_search',[$category->slug])); ?>" title="<?php echo e($category->name); ?> " target="_self">View Products  </a>                                   
                            
                        </div>

                     </div>
                  </div>
                  <?php
                     if($i == 4){
                        echo '<div class="clearfix"></div>';
                        $i=1;
                     }
                     else{
                        $i++;
                     }
                  ?>
                  
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


               <div class="clearfix"></div>
               <?php if(count($products) > 0): ?>
                  <div class="col-lg-12">
                  <h3 class="category_product" >Products</h3>
                  </div>
                  <div class="clearfix"></div>
               <?php endif; ?>

               <?php $i = 1; ?>
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="product-item-container">
                        <div class="left-block">
                           <div class="product-image-container second_img">
                              <a href="<?php echo e(route('product_detail',[$product->slug])); ?>" title="<?php echo e($product->name); ?>" target="_self" >

                              <?php
                                 $images = json_decode($product->images,true);
                                 if(is_array($images)){
                                    $image_show='n';
                                    foreach($images as $image){
                                       if(Storage::exists($image)){
                              ?>
                                 <img src="<?php echo e(Storage::url(findMTPath($image))); ?>" class="img-1 img-responsive" alt="<?php echo e($product->image_attr); ?>"> 
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
                           
                           <h4><a href="<?php echo e(route('product_detail',[$product->slug])); ?>" title="<?php echo e($product->name); ?>"  target="_self"><?php echo e(showProductName($product->name,50)); ?></a></h4>
                         
                           <div class="price">
                           <?php
                              $price = showProductPrice($product->regular_price, $product->sale_price);
                              echo $price;
                           ?>
                           </div>
                          
                           
                        </div>
                     </div>
                  </div>
                  <?php
                     if($i == 4){
                        echo '<div class="clearfix"></div>';
                        $i=1;
                     }
                     else{
                        $i++;
                     }
                  ?>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
               
            </div>
            <!--// End Changed listings-->
            <!-- Filters -->
            <?php if(count($products) > 0 ): ?>
               <div class="product-filter product-filter-bottom filters-panel">
                  <div class="row">
                     <div class="col-sm-12 text-center"><?php echo e($products->links()); ?></div>
                  </div>
               </div>
            <?php endif; ?>
            <!-- //end Filters -->
         </div>
      </div>
   </div>
</div>
<br /><br />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/brandProduct.blade.php ENDPATH**/ ?>