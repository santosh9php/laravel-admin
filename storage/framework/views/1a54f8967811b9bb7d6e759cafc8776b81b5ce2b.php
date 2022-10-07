<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($subcategory->subCategoryProduct)): ?>
        <li>
            <div class="caret open <?php if(in_array($subcategory->id,$cat_parents)): ?> caret-down <?php endif; ?>">
                <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="<?php echo e($subcategory->id); ?>" onchange="category_click(this,'<?php echo e($subcategory->name); ?>')" <?php if(in_array($subcategory->id,getCategoryFormAddValue())): ?> checked <?php endif; ?>> &nbsp;<?php echo e($subcategory->name); ?>

            </div>
            <?php if(count($category->subCategoryProduct)): ?>
            <ul class="nested <?php if(in_array($subcategory->id,$cat_parents)): ?> active <?php endif; ?>">
                
                 <?php echo $__env->make('admin.product.subCategory_addform',['subcategories' => $subcategory->subCategoryProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
            <?php endif; ?>
        </li>
    <?php else: ?> 
    <li>
        <div class="uncaret item">
            <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="<?php echo e($subcategory->id); ?>" onchange="category_click(this,'<?php echo e($subcategory->name); ?>')" <?php if(in_array($subcategory->id,getCategoryFormAddValue())): ?> checked <?php endif; ?>>&nbsp; <?php echo e($subcategory->name); ?>

        </div>
    </li>
     <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/product/subCategory_addform.blade.php ENDPATH**/ ?>