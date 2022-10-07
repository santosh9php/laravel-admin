<?php if(Auth::check() and isset(auth()->user()->email_verified_at)): ?>
    <?php echo $__env->make('admin.after_login_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.left_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('admin.before_login_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

    <?php echo $__env->yieldContent('body-content'); ?>

<?php if(Auth::check() and isset(auth()->user()->email_verified_at)): ?>
    <?php echo $__env->make('admin.after_login_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('admin.before_login_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

    <?php echo $__env->yieldContent('page-js-script'); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/main.blade.php ENDPATH**/ ?>