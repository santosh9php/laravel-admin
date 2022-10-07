<div class="container">
   <div class="row"> 
      <div class="stellarnav">
         <ul>
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            

            <li>
               
               <a>Spares By Segments</a>
               <ul>


                  <?php
                    $category_arr = createDataInArray($categories);
                  ?>
                  <?php $__currentLoopData = $category_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($category['parent_id'] === null): ?>
                     <li>
                       
                        <a href="<?php echo e(route('category_group_type_search',['segment',$category['slug']])); ?>">
                        <?php echo e($category['name']); ?></a>
                        <ul>
                           <?php
                              $brandsForMenu =createDataForMenuBrandBodypart($brands,$category['id']);
                              $brand_arr = createDataInArray($brandsForMenu);
                           ?>
                           <?php $__currentLoopData = $brand_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($brand['parent_id'] === null): ?>
                              <li>
                                 <a href="<?php echo e(route('segment_product_search',[$brand['slug']])); ?>"><?php echo e($brand['name']); ?></a>
                                 <?php if(count(findSublevel($brand_arr,$brand['id']))): ?>
                                    <?php echo $__env->make('subCategory.headerMenuSubBrand',['subcategories' => findSublevel($brand_arr,$brand['id']),], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                 <?php endif; ?>
                              </li>
                              <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </li>
                     <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  
               </ul>
            </li>                             
            <li>
               
               <a >Spares By Body Parts</a>
               <ul>

                  <?php
                    $category_arr = createDataInArray($categories);
                  ?>
                  <?php $__currentLoopData = $category_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($category['parent_id'] === null): ?>
                     <li>
                        <a href="<?php echo e(route('category_group_type_search',['bodypart',$category['slug']])); ?>">
                        <?php echo e($category['name']); ?></a>

                        <ul>
                              <?php
                              $bodypartsForMenu =createDataForMenuBrandBodypart($bodyparts,$category['id']);
                              $bodypart_arr = createDataInArray($bodypartsForMenu);
                              ?>
                              <?php $__currentLoopData = $bodypart_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($bodypart['parent_id'] === null): ?>
                                 <li>
                                    <a href="<?php echo e(route('bodypart_product_search',[$bodypart['slug']])); ?>"><?php echo e($bodypart['name']); ?></a>
                                    <?php if(count(findSublevel($bodypart_arr,$bodypart['id']))): ?>
                                       <?php echo $__env->make('subCategory.headerMenuSubBodypart',['subcategories' => findSublevel($bodypart_arr,$bodypart['id']),], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                 </li>
                                 <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                     </li>
                     <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  
               </ul>
            </li>
            
            <li><a href="<?php echo e(route('static_page',['about-us'])); ?>">About Us</a></li>
            <li><a href="<?php echo e(route('blog_post')); ?>">Blog</a></li>
            <li><a href="<?php echo e(route('static_page',['contact-us'])); ?>">Contact us</a></li>
         </ul>
      </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/common/headerMenu.blade.php ENDPATH**/ ?>