<div class="custom-cates">
   <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="yes" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="5" data-items_column0="5" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
      <?php $__currentLoopData = $randomBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="item">
         <a href="<?php echo e(route('segment_product_search',[$brand->slug])); ?>" class="img">
         <?php if($brand->image && Storage::exists($brand->image)): ?>
            <img src="<?php echo e(Storage::url(findBrandHPTPath($brand->image))); ?>" alt="<?php echo e($brand->image_attr); ?>">
         <?php else: ?>
            <img src="<?php echo e(Storage::url('media/brand/default/brandDefaultImage.webp')); ?>" alt="<?php echo e($brand->image_attr); ?>">
         <?php endif; ?>
         </a>
         <div class="cont">
            <h2><?php echo e($brand->name); ?></h2>
            <span><?php echo e(count($brand->product)); ?> products</span>
         </div>
         <div class="lnk"><a href="<?php echo e(route('segment_product_search',[$brand->slug])); ?>">Discover now</a></div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
   </div>
</div><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home/brands.blade.php ENDPATH**/ ?>