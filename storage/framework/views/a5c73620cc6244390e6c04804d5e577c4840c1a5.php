<?php $dash.='&nbsp;&nbsp;>&nbsp;&nbsp;'; ?>
<?php $__currentLoopData = $subbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($subbrand->id); ?>" <?php if(app('request')->input('search_brand') == $subbrand->id): ?> selected <?php endif; ?>><?php echo $dash; ?><?php echo e($subbrand->name); ?></option>
    <?php if(count($subbrand->subBrand)): ?>
        <?php echo $__env->make('admin.subBrand.subBrand_search',['subbrands' => $subbrand->subBrand], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/subBrand/subBrand_search.blade.php ENDPATH**/ ?>