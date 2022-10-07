<?php $dash.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td style="text-align:center;">
          <div class="form-check">
                <input class="form-check-input cat_check" type="checkbox" name="cat_ids" id="cat_ids" value="<?php echo e($subcategory->id); ?>" >
          </div>
      </td>
     <td style="text-align:center;">
        <?php echo e(session('cat_counter')); ?>

         <?php 
            session(['cat_counter' => session('cat_counter')+1]);
         ?>
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center"><div class="d-flex align-items-center"><?php echo $dash; ?> <i class="fa fa-arrow-right"></i> &nbsp; <?php echo e($subcategory->name); ?></div></div>
     </td>

      <td align="center">
         <?php
          echo count($subcategory->noOfproducts);
         ?>
      </td>
     
     <td align="center"><a href=""  data-category="<?php echo e($category->id); ?>" data-toggle="modal" data-target="#viewCategoryModal<?php echo e($subcategory->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a></td>


     <td style="text-align:center;">
        <div class="align-items-center"><i class="fa fa-circle text-success me-1"></i> <?php echo e($subcategory->status); ?></div>
     </td>
     <td style="text-align:center;"> 

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>

           <a href="<?php echo e(route('admin_category_edit',[$subcategory->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>

           <a href=""  data-category="<?php echo e($subcategory->id); ?>" data-toggle="modal" data-target="#delete_cat" class="btn btn-danger shadow btn-xs sharp category_delete"><i class="fa fa-trash"></i></a>

        <?php endif; ?>
       
     </td>
  </tr>

    <?php echo $__env->make('admin.model.view_category_for_subcategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(count($subcategory->subCategory)): ?>

        <?php echo $__env->make('admin.subCategory.subCategory_show',['subcategories' => $subcategory->subCategory,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/subCategory/subCategory_show.blade.php ENDPATH**/ ?>