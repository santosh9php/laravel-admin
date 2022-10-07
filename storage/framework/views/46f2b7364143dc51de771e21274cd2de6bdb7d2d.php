<ul>
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <a href="<?php echo e(route('segment_product_search',[$subcategory['slug']])); ?>"><?php echo e($subcategory['name']); ?></a>
        <?php if(count(findSublevel($brand_arr,$subcategory['id']))): ?>
            <?php echo $__env->make('subCategory.headerMenuSubBrand',['subcategories' => findSublevel($brand_arr,$subcategory['id']), ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/subCategory/headerMenuSubBrand.blade.php ENDPATH**/ ?>