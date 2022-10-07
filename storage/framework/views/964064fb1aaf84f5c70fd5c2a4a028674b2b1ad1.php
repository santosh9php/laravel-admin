<?php $__currentLoopData = $subbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($subbrand->subBrandProduct)): ?>
        <li>
            <div class="caret open <?php if(in_array($subbrand->id,$cat_parents)): ?> caret-down <?php endif; ?>">
                <input type="checkbox" id="html" class="radio-btn" name="brand_id[]" value="<?php echo e($subbrand->id); ?>" <?php if(in_array($subbrand->id,getBrandFormEditValue($product,$product->id))): ?> checked <?php endif; ?>> &nbsp;<?php echo e($subbrand->name); ?>

            </div>
            <?php if(count($subbrand->subBrandProduct)): ?>
            <ul class="nested <?php if(in_array($subbrand->id,$cat_parents)): ?> active <?php endif; ?>">
                 <?php echo $__env->make('admin.product.subBrand_editform',['subbrands' => $subbrand->subBrandProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
            <?php endif; ?>
        </li>
    <?php else: ?> 
    <li>
        <div class="uncaret item">
            <input type="checkbox" id="html" class="radio-btn" name="brand_id[]" value="<?php echo e($subbrand->id); ?>" <?php if(in_array($subbrand->id,getBrandFormEditValue($product,$product->id))): ?> checked <?php endif; ?>>&nbsp; <?php echo e($subbrand->name); ?>

        </div>
    </li>
     <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/product/subBrand_editform.blade.php ENDPATH**/ ?>