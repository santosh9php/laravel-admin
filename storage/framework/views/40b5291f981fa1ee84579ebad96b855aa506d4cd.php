

<?php $__env->startSection('body-content'); ?>
  
<div class="title_background">
	<h2>Our Blog</h2>
    <ul class="breadcrumb">
        <li><?php echo $breadcrum; ?></li>
    </ul>
</div>

<div class="main-container container">
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-md-12">
            <div class="blog-category clearfix">
                <div class="blog-listitem row">

                	<?php $i = 1; ?>
                	<?php $__currentLoopData = $blogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	                    <div class="blog-item col-lg-3 col-md-3 col-sm-6 col-xs-12">
	                        <div class="blog-item-inner clearfix">
	                            <div class="itemBlogImg clearfix">
	                                <div class="article-image">
	                                    <div>
	                                    	<?php if($blogPost->image && Storage::exists($blogPost->image)): ?>
			                                    <img src="<?php echo e(Storage::url(findMTPath($blogPost->image))); ?>" alt="<?php echo e($blogPost->image_attr); ?>" />
			                                <?php else: ?>
			                                	 <img src="<?php echo e(Storage::url('media/blog_post/default/blogPostDefaultImage.webp')); ?>" alt="" />

			                                <?php endif; ?>
	                                        
	                                    </div>
	                                    <div class="article-date">
	                                        <div><span class="article-date">
	                                            
	                                            <?php
		                                          $creation_time = strtotime($blogPost->created_at);
		                                        ?>
		                                        <b>
		                                       		<?php echo date("d",$creation_time); ?>
		                                   		</b><?php echo date("M",$creation_time); ?>
	                                        </span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="itemBlogContent clearfix ">
	                                <div class="blog-content">
	                                    <div class="article-title font-title">
	                                        <h4><a href="<?php echo e(route('blog_post_detail',[$blogPost->slug])); ?>" title="<?php echo e($blogPost->title); ?>"><?php echo e(showProductName($blogPost->title,58)); ?></a></h4>
	                                    </div>
	                                    
	                                    
	                                    <div class="readmore">  <a class="btn-readmore font-title" href="<?php echo e(route('blog_post_detail',[$blogPost->slug])); ?>" title="<?php echo e($blogPost->title); ?>"><i class="fa fa-caret-right"></i>Read More</a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <?php
	                     	if($i == 4){
	                        	echo '<div class="clearfix"></div>';
	                        	$i=1;
	                     	}
	                     	else{
	                        	$i++;
	                     	}
	                    ?>
          
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
                </div>
                <div class="product-filter product-filter-bottom filters-panel clearfix"> 
                    <div class="product-filter product-filter-top filters-panel hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-sm-12 view-mode">
                            <div class="list-view ">
                                <?php echo e($blogPosts->links()); ?>

                            </div>
                        </div>
                    </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!--Middle Part End-->
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/blogPosts.blade.php ENDPATH**/ ?>