<?php $__currentLoopData = $subbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($subbrand->subBrand)): ?>
        <li>
            <div class="caret open <?php if(in_array($subbrand->id,$cat_parents)): ?> caret-down <?php endif; ?>">
                <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="<?php echo e($subbrand->id); ?>" <?php if($subbrand->id == getFormEditValue($brand,'parent_id')): ?> checked <?php endif; ?>> &nbsp;<?php echo e($subbrand->name); ?>

            </div>
            <?php if(count($subbrand->subBrand)): ?>
            <ul class="nested <?php if(in_array($subbrand->id,$cat_parents)): ?> active <?php endif; ?>">
                 <?php echo $__env->make('admin.subBrand.subBrand_editform',['subbrands' => $subbrand->subBrand,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
            <?php endif; ?>
        </li>
    <?php else: ?> 
    <li>
        <div class="uncaret item">
            <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="<?php echo e($subbrand->id); ?>" <?php if($subbrand->id == getFormEditValue($brand,'parent_id')): ?> checked <?php endif; ?>>&nbsp; <?php echo e($subbrand->name); ?>

        </div>
    </li>
     <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/subBrand/subBrand_editform.blade.php ENDPATH**/ ?>