<?php $dash.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<?php $__currentLoopData = $subbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>
        <div class="form-check">
             <input class="form-check-input brand_check" type="checkbox" name="brand_ids" id="brand_ids" value="<?php echo e($subbrand->id); ?>" >
        </div> 
      </td>
     <td style="text-align:center;">
        <?php echo e(session('brand_counter')); ?>

         <?php 
            session(['brand_counter' => session('brand_counter')+1]);
         ?>
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center"><div class="d-flex align-items-center"><?php echo $dash; ?><i class="fa fa-arrow-right"></i>  <?php echo e($subbrand->name); ?></div></div>
     </td>
     
     <td style="text-align:center;"><a href=""  data-brand="<?php echo e($brand->id); ?>" data-toggle="modal" data-target="#viewBrandModal<?php echo e($subbrand->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
     <td style="text-align:center;">
        <i class="fa fa-circle text-success me-1"></i> <?php echo e($subbrand->status); ?> 
     </td>
     <td style="text-align:center;">
        
           <a href="<?php echo e(route('admin_brand_edit',[$subbrand->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
           <a href=""  data-brand="<?php echo e($subbrand->id); ?>" data-toggle="modal" data-target="#delete_brand" class="btn btn-danger shadow btn-xs sharp brand_delete"><i class="fa fa-trash"></i></a>
         
     </td>
  </tr>

    <?php echo $__env->make('admin.model.view_brand_for_subbrand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(count($subbrand->subBrand)): ?>

        <?php echo $__env->make('admin.subBrand.subBrand_show',['subbrands' => $subbrand->subBrand,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/subBrand/subBrand_show.blade.php ENDPATH**/ ?>