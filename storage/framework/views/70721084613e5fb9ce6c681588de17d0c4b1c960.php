

<?php $__env->startSection('body-content'); ?>


 


<div class="title_background">
    <h2>Got Questions? We’ve Got Answers!</h2>
    <ul class="breadcrumb">
        <li><?php echo $breadcrum; ?></li>
    </ul>
</div>
 

<div class="main-container container">
	<?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <div class="row">
	        <div id="content" class="col-sm-12"> 
	            <h2 class="h2_heading"><?php echo e($faqCategory->name); ?></h2>
	            <div class="row">
	                <div class="col-sm-12">
	                    <ul class="yt-accordion">
	                    	<?php $__currentLoopData = $faqCategory->findFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        <li class="accordion-group">
		                            <h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span><?php echo e($faq->question); ?></span></h3>
		                            <div class="accordion-inner">
		                                <?php echo $faq->answer; ?>

		                            </div>
		                        </li>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
    <br><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<br><br><br>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/faqs.blade.php ENDPATH**/ ?>