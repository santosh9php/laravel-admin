<?php $dash.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<?php $__currentLoopData = $subbodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subbodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>
        <div class="form-check">
            <input class="form-check-input bodypart_check" type="checkbox" name="bodypart_ids" id="bodypart_ids" value="<?php echo e($subbodypart->id); ?>" >
        </div> 
      </td>
     <td style="text-align:center;">
        <?php echo e(session('bodypart_counter')); ?>

         <?php 
            session(['bodypart_counter' => session('bodypart_counter')+1]);
         ?>
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center"><div class="d-flex align-items-center"><?php echo $dash; ?><i class="fa fa-arrow-right"></i> &nbsp;  <?php echo e($subbodypart->name); ?></div></div>
     </td>
     
     <td align="center"><a href=""  data-bodypart="<?php echo e($bodypart->id); ?>" data-toggle="modal" data-target="#viewBodypartModal<?php echo e($subbodypart->id); ?>" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
     <td style="text-align:center;"> <i class="fa fa-circle text-success me-1"></i> <?php echo e($subbodypart->status); ?>  </td>
     <td style="text-align:center;"> 
           <a href="<?php echo e(route('admin_bodypart_edit',[$subbodypart->id])); ?>"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>
           <a href=""  data-bodypart="<?php echo e($subbodypart->id); ?>" data-toggle="modal" data-target="#delete_bodypart" class="btn btn-danger shadow btn-xs sharp bodypart_delete"><i class="fa fa-trash"></i></a>
        
     </td>
  </tr>

    <?php echo $__env->make('admin.model.view_bodypart_for_subbodypart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(count($subbodypart->subBodypart)): ?>

        <?php echo $__env->make('admin.subBodyPart.subBodyPart_show',['subbodyparts' => $subbodypart->subBodypart,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/subBodyPart/subBodyPart_show.blade.php ENDPATH**/ ?>