<div class="container">
      <div class="module so-latest-blog blog-home">
 
         <div class="home_categories">
               <h2 style="margin:0 !important;"> Latest  <span> blogs</span>  </h2>
            </div>
          
         <div class="modcontent clearfix">
            <div class="so-blog-external buttom-type1 button-type1">
               <div class="blog-external yt-content-slider contentslider" data-rtl="no" data-loop="no" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="3" data-items_column0="3" data-items_column1="2" data-items_column2="2" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                  <?php $__currentLoopData = $latestBlogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="media">
                        <div class="item head-button">
                           <div class="media-left so-block">
                              <a class="imag" href="<?php echo e(route('blog_post_detail',[$post->slug])); ?>" title="<?php echo e($post->title); ?>">
                                 <?php if($post->image && Storage::exists($post->image)): ?>
                                    <img src="<?php echo e(Storage::url(findMTPath($post->image))); ?>" alt="<?php echo e($post->image_attr); ?>" />
                                 <?php else: ?>
                                    <img src="<?php echo e(Storage::url('media/blog_post/default/blogPostDefaultImage.webp')); ?>" alt="" />
                                 <?php endif; ?>
                              </a>
                           </div>
                           <div class="media-body">
                              <div class="media-content so-block">
                                 <div class="infos">
                                    <span class="media-date-added">
                                       <?php
                                          $creation_time = strtotime($post->created_at);

                                          echo date("F jS \, Y",$creation_time);
                                       ?>
                                    </span> 
                                    <span class="media-author">
                                       <?php
                                          if($post->BlogUser){
                                             $BlogUser = $post->BlogUser;
                                             echo $BlogUser->fname." ".$BlogUser->lname;
                                          }
                                       ?>
                                    </span>
                                 </div>
                                 <h4 class="media-heading font-title head-item">
                                    <a href="<?php echo e(route('blog_post_detail',[$post->slug])); ?>" title="<?php echo e($post->title); ?>" target="_self"><?php echo e(showProductName($post->title,65)); ?></a>
                                 </h4>


                                 <div>
                                    <a class="btn continue_shopping" href="<?php echo e(route('blog_post_detail',[$post->slug])); ?>" target="_self" title="<?php echo e($post->title); ?>"><span>Read more</span> </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/home/latest_blogs.blade.php ENDPATH**/ ?>