

<?php $__env->startSection('body-content'); ?>










 <?php if($category_name or $breadcrum): ?>
                 <div class="title_background">
                   <h2><?php echo e($category_name); ?></h2>
                   <div class="navigator"><?php echo $breadcrum; ?></div>
                </div>
               
            <?php endif; ?>
           
          









<div class="main-container container">

  
   <div class="row">
      <!--Left Part Start -->
         <?php echo $__env->make('productSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--Left Part End -->

      <!--Middle Part Start-->
      <div id="content" class="col-md-9 col-sm-8">
         <div class="products-category">

              


             <?php if(count($products) == 0): ?>

               <div class="prodcut_not_found">
                   <img src="<?php echo e(asset('frontend_assets/image/no_record_found.png')); ?>" alt="imgpayment" class="img-1 img-responsive">
                   <h2 class="no_record_found">No Record Found.</h2> 
               </div>

            <?php endif; ?>


           

            <div class="clearfix"></div>
            
            <!--changed listings-->
            <div class="products-list row nopadding-xs so-filter-gird">
               <?php $i = 1; ?>
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                  <?php
                     if($i == 3){
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
      <!--Middle Part End-->
      
   </div>
   <!--Middle Part End-->
   
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">
   /*
   var toggler = document.getElementsByClassName("options_list");
   var i;
   for (i = 0; i < toggler.length; i++) {

     toggler[i].addEventListener("click", function() {
       this.parentElement.parentElement.querySelector(".nested").classList.toggle("active");
       this.parentElement.classList.toggle("caret_heading_down");
     });
   }
   */

   //For Tree view of category
      var toggler = document.getElementsByClassName("caret_heading");
      var i;
      for (i = 0; i < toggler.length; i++) {

         toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret_heading_down");
         });
         
      }

   //End of tree view

   var toggler = document.getElementsByClassName("top_level_search_head");
   var i;
   for (i = 0; i < toggler.length; i++) {

     toggler[i].addEventListener("click", function() {
      if(this.parentElement.querySelector(".collapse_expand").classList.contains("collapsedIndicator")){
         this.parentElement.querySelector(".collapse_expand").classList.remove("collapsedIndicator");
         this.parentElement.querySelector(".collapse_expand").classList.add("expandedIndicator");
         this.parentElement.querySelector(".collapse_expand").innerHTML ='-';
      } else {

         this.parentElement.querySelector(".collapse_expand").classList.remove("expandedIndicator");
         this.parentElement.querySelector(".collapse_expand").classList.add("collapsedIndicator");
         this.parentElement.querySelector(".collapse_expand").innerHTML ='+';
      }
        
       this.parentElement.querySelector(".nested").classList.toggle("active");
       //this.classList.toggle("caret_heading_down");
     });
   }

/*
$('input:checkbox').click(function() {
   if(!$(this).is(':checked')){
      $(this).parent().next().find(':checkbox').prop('checked', false); 

       $(this).parent().parent().find("ul").removeClass('active');


      //this.parentElement.parentElement.querySelector(".nested").classList.remove("active");
   }                            
});

$('input:checkbox').each(function(){
   if($(this).is(':checked')){

      if(this.parentElement.parentElement.querySelector(".nested")){
         this.parentElement.parentElement.querySelector(".nested").classList.add("active");
      }
   }  

})
*/

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/product.blade.php ENDPATH**/ ?>