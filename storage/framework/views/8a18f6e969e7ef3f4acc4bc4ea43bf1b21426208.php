

<?php $__env->startSection('body-content'); ?>
  







<div class="title_background">
	<div class="container">
		<h2><?php echo e($blogPost->title); ?></h2>
		<ul class="breadcrumb">
			<li><?php echo $breadcrum; ?></li>
		</ul>
	</div>
</div>





 

    <!-- Main Container  -->
    <div class="main-container container"> 
        <div class="row"> 
            <div id="content" class="col-md-9">
                <div class="article-info"> 
                    <div class="form-group" style="text-align:center;">
                    	<?php if($blogPost->image && Storage::exists($blogPost->image)): ?>
                            <img src="<?php echo e(Storage::url($blogPost->image)); ?>" alt="<?php echo e($blogPost->image_attr); ?>" />
                        <?php else: ?>
                        	 <img src="<?php echo e(Storage::url('media/blog_post/default/blogPostDefaultImage.webp')); ?>" alt="" />

                        <?php endif; ?>
                    </div>
                     <div class="article-sub-title"> 
                        <span class="article-date">
                        	Created Date: 
                        	<?php
                              $creation_time = strtotime($blogPost->created_at);
                              echo date("D, M j, Y",$creation_time);
                            ?>
                    	</span>
                    </div>
                    <div class="article-description" style="line-height: 28px;">
                       	<?php echo $blogPost->content; ?> 
                    </div>
                    <!--
	                    <div class="panel panel-default related-comment">
	                        <div class="panel-body">
	                            <div class="form-group">
	                                <div id="comments" class="blog-comment-info">
	                                    
	                                    <h3 class="blog-header">Leave your comment  </h3>
	                                    <p>your email address will not be published required field market.</p>
	                                    <input type="hidden" name="blog_article_reply_id" value="0" id="blog-reply-id">
	                                    <div class="comment-left contacts-form row">
	                                        <div class="col-md-6"> 
	                                            <input type="text" name="name" placeholder="Name" class="form-control"> 
	                                        </div>
	                                        <div class="col-md-6"> 
	                                            <input type="text" name="name" placeholder="Email Id" class="form-control"> 
	                                        </div>

	                                        <div class="col-md-12"> 
	                                            <textarea rows="6" cols="50" name="text" placeholder="Comment" class="form-control"></textarea>
	                                          </div> 
	                                    </div> 
	                                    <div class="text-left"><a id="button-comment" class="btn blog-btn"><span>Submit</span></a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                	-->
                </div>
                <br><br><br>
            </div>
            

            <!--Left Part Start -->
            <aside class="col-md-3 content-aside left_column " id="column-left">
                 
                <div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Latest Blog</span>
                    </h3>
                    <?php $__currentLoopData = $latestBlogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlogPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <div class="modcontent"> 
	                        <div class="row"> 
	                            <div class="col-md-4"> 
	                                <?php if($latestBlogPost->image && Storage::exists($latestBlogPost->image)): ?>
	                                    <img src="<?php echo e(Storage::url(findSTPath($latestBlogPost->image))); ?>" alt="<?php echo e($latestBlogPost->image_attr); ?>" />
	                                <?php else: ?>
	                                	 <img src="<?php echo e(Storage::url('media/blog_post/default/blogPostDefaultImage.webp')); ?>" alt="" />

	                                <?php endif; ?> 
	                            </div> 
	                            <div class="col-md-8"> 
	                            	<a href="<?php echo e(route('blog_post_detail',[$latestBlogPost->slug])); ?>" title="<?php echo e($latestBlogPost->title); ?>">
		                                <strong>
		                                	<?php echo e($latestBlogPost->title); ?>

		                                	
		                                </strong>
	                                </a>
	                                  <br>
	                                <b> Date: </b> 
	                                <?php
                                      $creation_time = strtotime($latestBlogPost->created_at);
                                      echo date("j M Y",$creation_time);
                                    ?>
	                                 &nbsp;&nbsp; <br> 	
	                            </div> 
	                            <div class="clearfix"></div>  
	                        </div>  
	                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> 
            </aside> 
        </div> 
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/blogPostDetail.blade.php ENDPATH**/ ?>