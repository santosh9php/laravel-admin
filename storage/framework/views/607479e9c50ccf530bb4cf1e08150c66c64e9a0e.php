




<aside class="col-sm-4 col-md-3 content-aside" id="column-left">
 
   <div class="module">
      <h3 class="modtitle">Filter </h3>
      <div class="modcontent ">
         <form method="get" action="<?php echo e(route('product_search')); ?>">
            <div class="table_layout filter-shopby">
               
               <div class="table_row">
                  <div class="table_cell" style="z-index: 103;">
                     <legend>Search</legend>
                     <input class="form-control" type="text" name="product_keyword" value="<?php echo e(app('request')->input('product_keyword')); ?>" size="50" autocomplete="off" placeholder="Search" name="search">
                  </div>

                  <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                  <!--
                  <div class="table_cell">
                     <fieldset>
                        <legend>Price</legend>
                        <div class="range">
                           Range :
                           <span class="min_val"></span> - 
                           <span class="max_val"></span>
                           <input type="hidden" name="price_min_value" class="min_value" value="188.73">
                           <input type="hidden" name="price_max_value" class="max_value" value="335.15">
                        </div>
                        <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                           <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                           <span class="ui-slider-handle ui-state-default ui-corner-all" ></span>
                           <span class="ui-slider-handle ui-state-default ui-corner-all" ></span>
                        </div>
                     </fieldset>
                  </div>
               -->
                  <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - --->
                  
                  <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - -->
                  <?php
                  /*
                     $cat_parents = array();
                     $category_filter = array();
                     $category_filter = app('request')->input('category_filter');
                     $cat_parents = App\Http\Controllers\ProductSearchController::getAllParents(createDataInArray($categories),$category_filter);
                     if($category_filter == '') $category_filter = array();
                     */
                  ?>
                  
                  <?php 
                     $cat_parents = array();
                     $category_filter = array();
                     $category_filter = app('request')->input('category_filter');
                     //$cat_parents = App\Http\Controllers\ProductSearchController::getAllParents(createDataInArray($categories),$category_filter);
                     $cat_parents = $category_filter;
                     if($category_filter == '') $category_filter = array();
                     if($cat_parents == '') $cat_parents = array();

                     $brand_parents = array();
                     $brand_filter = array();
                     $brand_filter = app('request')->input('brand_filter');
                     $brand_parents = App\Http\Controllers\ProductSearchController::getAllParents(createDataInArray($brands),$brand_filter);
                     if($brand_filter == '') $brand_filter = array();

                     
                  ?>
                  <div class="table_cell">
                     <fieldset>
                        <legend>Segments</legend>

                        <ul id="myUL" class="checkboxes_list_product">
                        <?php
                           $category_arr = createDataInArray($categories);
                        ?>
                           <?php $__currentLoopData = $category_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($category['parent_id'] === null): ?>
                                 <li>

                                    <div class="caret_heading_category open <?php if(in_array($category['id'],$cat_parents)): ?> caret_heading_down <?php endif; ?> top_level_search_head" >

                                      

                                       <?php
                                          $brandsForSearch =createDataForMenuBrandBodypart($brands,$category['id']);
                                          $brands_arr = createDataInArray($brandsForSearch);
                                          $allBrandsArray=array();
                                          foreach($brands_arr as $arr){
                                             array_push($allBrandsArray,$arr['id']);
                                          }


                                          if(isset($categoryType) and isset($categoryId) and $categoryType == 'segment' and $categoryId != ''){

                                             array_push($brand_filter,$categoryId);

                                             $brand_parents = App\Http\Controllers\ProductSearchController::getParents($brands_arr,$brand_filter[0]);

                                             //$brand_filter = $brand_parents; 
                                            
                                          } 

                                         
                                       ?>
                                       <span 
                                          <?php if(count(array_intersect($brand_filter, $allBrandsArray)) > 0): ?>
                                             class="collapse_expand expandedIndicator">-
                                          <?php else: ?>
                                             class="collapse_expand collapsedIndicator">+
                                          <?php endif; ?>
                                       </span>
                                       <?php echo e($category['name']); ?>

                                    </div>
                                          
                                          <ul class="nested <?php if(count(array_intersect($brand_filter, $allBrandsArray)) > 0): ?> active <?php endif; ?>">
                                             
                                          <?php $__currentLoopData = $brands_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if($brand['parent_id'] === null): ?>
                                                <li>
                                                   <?php if(count(findSublevel($brands_arr,$brand['id']))): ?>
                                                      <div class="caret_heading open <?php if(in_array($brand['id'],$brand_parents)): ?> caret_heading_down <?php endif; ?>">
                                                   <?php else: ?>
                                                      <div class="uncaret open">
                                                   <?php endif; ?>
                                                      <input class="options_list" type="checkbox" level="parent" name="brand_filter[]" value="<?php echo e($brand['id']); ?>" <?php if(in_array($brand['id'], $brand_filter)): ?> checked <?php endif; ?> id="brand_<?php echo e($brand['id']); ?>">
                                                      <?php echo e($brand['name']); ?>

                                                   </div>
                                                
                                                <?php if(count(findSublevel($brands_arr,$brand['id']))): ?>
                                                   <ul class="nested <?php if(in_array($brand['id'],$brand_parents)): ?>   active <?php endif; ?>">
                                                      <?php echo $__env->make('subCategory.productSearchSubBrand',['subcategories' => findSublevel($brands_arr,$brand['id']),'brand_parents'=>$brand_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                   </ul>
                                                <?php endif; ?>
                                                </li>
                                             <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                         
                                       </ul>

                                 </li>
                              <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>




                        
                     </fieldset>
                  </div>
                  <?php 
                     
                     $bodypart_parents = array();
                     $bodypart_filter = array();
                     $bodypart_filter = app('request')->input('bodypart_filter');
                     $bodypart_parents = App\Http\Controllers\ProductSearchController::getAllParents(createDataInArray($bodyparts),$bodypart_filter);
                     if($bodypart_filter == '') $bodypart_filter = array();
                    
                  ?>
                  <div class="table_cell">
                     <fieldset>
                        <legend>Body Parts</legend>
                        <ul id="myUL" class="checkboxes_list_product">
                        <?php
                           $category_arr = createDataInArray($categories);
                        ?>
                           <?php $__currentLoopData = $category_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($category['parent_id'] === null): ?>
                                 <li>
                                    <div class="caret_heading_category open <?php if(in_array($category['id'],$cat_parents)): ?> caret_heading_down <?php endif; ?> top_level_search_head">
                                       

                                       <?php
                                          $bodypartsForSearch =createDataForMenuBrandBodypart($bodyparts,$category['id']);

                                          $bodyparts_arr = createDataInArray($bodypartsForSearch);

                                          $allBodypartsArray=array();

                                          foreach($bodyparts_arr as $arr){
                                             array_push($allBodypartsArray,$arr['id']);
                                          }
                                          

                                          if(isset($categoryType) and isset($categoryId) and $categoryType == 'bodypart' and $categoryId != ''){

                                             array_push($bodypart_filter,$categoryId);

                                             $bodypart_parents = App\Http\Controllers\ProductSearchController::getParents($bodyparts_arr,$bodypart_filter[0]);

                                            // $bodypart_filter = $bodypart_parents; 
                                            
                                          } 
                                       ?>
                                       <span 
                                          <?php if(count(array_intersect($bodypart_filter, $allBodypartsArray)) > 0): ?>
                                             class="collapse_expand expandedIndicator">-
                                          <?php else: ?>
                                             class="collapse_expand collapsedIndicator">+
                                          <?php endif; ?>
                                       </span>
                                      

                                       <?php echo e($category['name']); ?>

                                    </div>
                                 
                                    <?php
                                       
                                    ?>
                                    <ul  class="nested <?php if(count(array_intersect($bodypart_filter, $allBodypartsArray)) > 0): ?> active <?php endif; ?>">
                                       <?php $__currentLoopData = $bodyparts_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($bodypart['parent_id'] === null): ?>
                                             <li>
                                                <?php if(count(findSublevel($bodyparts_arr,$bodypart['id']))): ?>
                                                   <div class="caret_heading open <?php if(in_array($bodypart['id'],$bodypart_parents)): ?> caret_heading_down <?php endif; ?>">
                                                   
                                                <?php else: ?>
                                                   <div class="uncaret open">
                                                <?php endif; ?>
                                                <input class="options_list" type="checkbox" name="bodypart_filter[]" value="<?php echo e($bodypart['id']); ?>" <?php if(in_array($bodypart['id'], $bodypart_filter)): ?> checked <?php endif; ?> id="bodypart_<?php echo e($bodypart['id']); ?>">
                                                   <?php echo e($bodypart['name']); ?>

                                                </div>

                                             <?php if(count(findSublevel($bodyparts_arr,$bodypart['id']))): ?>
                                                <ul class="nested <?php if(in_array($bodypart['id'],$bodypart_parents)): ?>   active <?php endif; ?>">
                                                   <?php echo $__env->make('subCategory.productSearchSubBodypart',['subcategories' => findSublevel($bodyparts_arr,$bodypart['id']),'bodypart_parents'=>$bodypart_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </ul>
                                             <?php endif; ?>
                                             </li>
                                          <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                    </ul>


                                 </li>
                              <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>


                        
                     </fieldset>
                  </div>
                  <!-- - - - - - - - - - - - - - End Category filter - - - - - - - - -->

                  

                  <!-- - - - - - - - - - - - - - Color - - - - - - - - - - - - - - - - -->
                  <?php /* ?>
                  <?php
                     $product_color = array();
                     $product_color = app('request')->input('product_color');
                     if($product_color == '') $product_color = array();
                  ?>
                  <div class="table_cell">
                     <fieldset>
                        <legend>Color</legend>
                        <div class="row">
                           <div class="col-sm-6">
                              <ul class="simple_vertical_list">
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="green" id="color_btn_1" @if(in_array('green', $product_color)) checked @endif >
                                    <label for="color_btn_1" class="color_btn green">Green</label>
                                 </li>
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="yellow" id="color_btn_2" @if(in_array('yellow', $product_color)) checked @endif >
                                    <label for="color_btn_2" class="color_btn yellow">Yellow</label>
                                 </li>
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="red" id="color_btn_3" @if(in_array('red', $product_color)) checked @endif>
                                    <label for="color_btn_3" class="color_btn red">Red</label>
                                 </li>
                              </ul>
                           </div>
                           <div class="col-sm-6">
                              <ul class="simple_vertical_list">
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="blue" id="color_btn_4" @if(in_array('blue', $product_color)) checked @endif>
                                    <label for="color_btn_4" class="color_btn blue">Blue</label>
                                 </li>
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="grey" id="color_btn_5" @if(in_array('grey', $product_color)) checked @endif>
                                    <label for="color_btn_5" class="color_btn grey">Grey</label>
                                 </li>
                                 <li>
                                    <input class="options_list" type="checkbox" name="product_color[]" value="orange" id="color_btn_6" @if(in_array('orange', $product_color)) checked @endif>
                                    <label for="color_btn_6" class="color_btn orange">Orange</label>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </fieldset>
                  </div>
                  <?php */ ?>
                  <!-- - - - - - - - - - - - - - End Color - - - - - - - - - - - - - -->
               </div>
               <footer class="bottom_box">
                  <div class="buttons_row">
                     <button type="submit" class="button_grey button_submit">Search</button>
                     <!--<button type="reset" class="button_grey filter_reset">Reset</button>-->
                  </div>
                  <!--Back To Top-->
                  <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
               </footer>
            </div>
         </form>
      </div>
   </div>
          
</aside>

<script type="text/javascript">
   function category_filter_set(category_id){
      //alert(category_id);
      $(document).ready(function(){
         $("#category_filter").eq(0).val(category_id);
      });
   }  
</script>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/productSearch.blade.php ENDPATH**/ ?>