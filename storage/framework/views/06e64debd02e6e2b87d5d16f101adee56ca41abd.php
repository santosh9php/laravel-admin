<?php $__currentLoopData = $subbodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($subbodypart->subBodypartProduct)): ?>
        <li>
            <div class="caret open <?php if(in_array($subbodypart->id,$cat_parents)): ?> caret-down <?php endif; ?>">
                <input type="checkbox" id="html" class="radio-btn" name="bodypart_id" value="<?php echo e($subbodypart->id); ?>" <?php if(old('bodypart_id') == $subbodypart->id): ?> checked <?php endif; ?>> &nbsp;<?php echo e($subbodypart->name); ?>

            </div>
            <?php if(count($subbodypart->subBodypartProduct)): ?>
            <ul class="nested <?php if(in_array($subbodypart->id,$cat_parents)): ?> active <?php endif; ?>">
                 <?php echo $__env->make('admin.product.subBodyPart_addform',['subbodyparts' => $subbodypart->subBodypartProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
            <?php endif; ?>
        </li>
    <?php else: ?> 
    <li>
        <div class="uncaret item">
            <input type="checkbox" id="html" class="radio-btn" name="bodypart_id" value="<?php echo e($subbodypart->id); ?>" <?php if(old('bodypart_id') == $subbodypart->id): ?> checked <?php endif; ?>>&nbsp; <?php echo e($subbodypart->name); ?>

        </div>
    </li>
     <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/product/subBodyPart_addform.blade.php ENDPATH**/ ?>