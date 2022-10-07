<?php $dash.='&nbsp;&nbsp;>&nbsp;&nbsp;'; ?>
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($subcategory->id); ?>" <?php if(app('request')->input('search_category') == $subcategory->id): ?> selected <?php endif; ?>><?php echo $dash; ?><?php echo e($subcategory->name); ?></option>
    <?php if(count($subcategory->subCategory)): ?>
        <?php echo $__env->make('admin.subCategory.subCategory_search',['subcategories' => $subcategory->subCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/subCategory/subCategory_search.blade.php ENDPATH**/ ?>