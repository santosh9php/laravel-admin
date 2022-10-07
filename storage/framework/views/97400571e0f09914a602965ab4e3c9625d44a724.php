

<?php $__env->startSection('body-content'); ?>

 

<div class="main-container">

	<div id="content">

		<?php echo $__env->make('home.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo $__env->make('home.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		     
		<?php echo $__env->make('home.bike_auto_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


		<?php echo $__env->make('home.best_popular_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     

		<br><br>

		<?php echo $__env->make('home.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

		<?php echo $__env->make('home.featured_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     

		<?php echo $__env->make('home.recent_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

		<?php echo $__env->make('home.latest_blogs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
	    
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home.blade.php ENDPATH**/ ?>