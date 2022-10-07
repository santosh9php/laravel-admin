<div class="row-cates" style="padding: 0;">
         <div class="col-lg-6" style="padding: 0;"> <img src="<?php echo e(asset('frontend_assets/image/bike.jpg')); ?>" class="img-responsive" />  </div>
         <div class="col-lg-6 pl-3 pr-3">
            <div class="module">
               <div class="home_categories">
                  <h2 class="mb-25"> Shop by <span>bike product</span>  </h2>
                   <div class="col-md-12">
                      <div class="modcontent">
                         <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                            <div class="loadeding"></div>
                            <div class="ltabs-wrap">
                               <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="3" data-md="3" data-sm="3" data-xs="1" data-margin="30">
                                  <!--Begin Tabs-->
                                  <div class="ltabs-tabs-wrap">
                                     <span class="ltabs-tab-selected">Brake Parts</span> <span class="ltabs-tab-arrow">▼</span>
                                     <div class="item-sub-cat">
                                        <ul class="ltabs-tabs cf" style="display: none !important;">
                                           <li class="ltabs-tab tab-sel" data-category-id="31" data-active-content=".items-category-31"> <span class="ltabs-tab-label"></span> </li>
                                           <li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label" </span> </li>
                                           <li class="ltabs-tab " data-category-id="25" data-active-content=".items-category-25"> <span class="ltabs-tab-label"> </span> </li>
                                        </ul>
                                     </div>
                                  </div>
                                  <!-- End Tabs-->
                               </div>
                               <div class="wap-listing-tabs products-list grid">
                                  <div class="ltabs-items-container">
                                     <!--Begin Items-->
                                     <div class="ltabs-items ltabs-items-selected items-category-31" data-total="16">
                                        <div class="ltabs-items-inner ltabs-slider">
                                           <?php $__currentLoopData = $two_wheeler_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php echo $__env->make('home.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
         <div class="clearfix"></div>
         <div class="col-lg-6 pl-3 pr-3">
            <div class="module">
               <div class="home_categories">
                 <h2 class="mb-25">  Shop by <span>Auto Rickshaw  Product</span>  </h2>
                   <div class="col-sm-12">
                          <div class="modcontent">
                             <div id="so_listing_tabs_2" class="so-listing-tabs first-load">
                                <div class="loadeding"></div>
                                <div class="ltabs-wrap">
                                   <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="3" data-md="3" data-sm="3" data-xs="1" data-margin="30">
                                      <div class="ltabs-tabs-wrap" style="display: none;">
                                         <span class="ltabs-tab-selected">  </span> <span class="ltabs-tab-arrow">▼</span>
                                         <div class="item-sub-cat">
                                            <ul class="ltabs-tabs cf">
                                               <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label"></span> </li>
                                               <li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label"> </span> </li>
                                               <li class="ltabs-tab " data-category-id="25" data-active-content=".items-category-25"> <span class="ltabs-tab-label">   </span> </li>
                                            </ul>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="wap-listing-tabs products-list grid">
                                      <div class="ltabs-items-container">
                                         <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                                            <div class="ltabs-items-inner ltabs-slider">
                                               <?php $__currentLoopData = $three_wheeler_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php echo $__env->make('home.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                         </div>
                                         <div class="ltabs-items items-category-18 grid" data-total="16">
                                            <div class="ltabs-loading"></div>
                                         </div>
                                         <div class="ltabs-items  items-category-25 grid" data-total="16">
                                            <div class="ltabs-loading"></div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6" style="padding: 0;"> <img src="<?php echo e(asset('frontend_assets/image/auto_rickshaw.jpg')); ?>" class="img-responsive" />  </div>
         <div class="clearfix"></div>
      </div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home/bike_auto_products.blade.php ENDPATH**/ ?>