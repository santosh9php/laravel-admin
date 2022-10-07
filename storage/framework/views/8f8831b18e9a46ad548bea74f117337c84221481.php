<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count(findSublevel($bodyparts_arr,$subcategory['id']))): ?>

        <li>  
            <?php if(count(findSublevel($bodyparts_arr,$subcategory['id']))): ?>  
                <div class="caret_heading open <?php if(in_array($subcategory['id'],$bodypart_parents)): ?> caret_heading_down <?php endif; ?>">
            <?php else: ?>
                <div class="uncaret open">
            <?php endif; ?>

                <input class="options_list" type="checkbox" name="bodypart_filter[]" value="<?php echo e($subcategory['id']); ?>" <?php if(in_array($subcategory['id'], $bodypart_filter)): ?> checked <?php endif; ?> id="bodypart_<?php echo e($subcategory['id']); ?>">
                 <?php echo e($subcategory['name']); ?>

            </div>
            <?php if(count(findSublevel($bodyparts_arr,$subcategory['id']))): ?>
                <ul class="nested <?php if(in_array($subcategory['id'],$bodypart_parents)): ?> active <?php endif; ?>">

                    <?php echo $__env->make('subCategory.productSearchSubBodypart',['subcategories' => findSublevel($bodyparts_arr,$subcategory['id']),'bodypart_parents'=>$bodypart_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </ul>
            <?php endif; ?>
        </li>

    <?php else: ?>

        <li>
            <div class="uncaret item" style="margin-left: 13px;">
                <input class="options_list" type="checkbox" name="bodypart_filter[]" value="<?php echo e($subcategory['id']); ?>" <?php if(in_array($subcategory['id'], $bodypart_filter)): ?> checked <?php endif; ?> id="bodypart_<?php echo e($subcategory['id']); ?>">
                <?php echo e($subcategory['name']); ?>

            </div>
        </li>

    <?php endif; ?>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/subCategory/productSearchSubBodypart.blade.php ENDPATH**/ ?>