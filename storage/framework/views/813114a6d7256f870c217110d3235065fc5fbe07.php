<header id="header" class=" typeheader-3">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-2 col-md-4 col-sm-5 hidden-xs">
                    <div class="telephone ">
                        <ul class="socials">
                            <li class="facebook"><a href="https://www.facebook.com/sk.autospares1967" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            

                            <li class="instagram"><a href="https://www.instagram.com/sk.autospares1967/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/company/sk-autospares/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right col-lg-10 col-md-8 col-sm-7 col-xs-12">
                    <ul class="top-log list-inline  lang-curr">
                        <?php if(!Auth::check()): ?>
                            <li><i class="fa fa-lock"></i><a href="<?php echo e(route('user_login')); ?>">Login</a> / </li>
                            <li><a href="<?php echo e(route('user_register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li><i class="fa fa-lock"></i><a href="<?php echo e(route('user_logout')); ?>">Logout</a> </li>
                        <?php endif; ?>
                    </ul>
                </div>

                
            </div>
        </div>
    </div>
    <div class="header-middle hidden-compact">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('frontend_assets/image/catalog/logo.png')); ?>" title="Your Store" alt="Your Store" /></a>
                    </div>
                </div>
                <div id="ajax_brand_loader"></div>
                <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 middle-right">
                    <div class="<?php if(Auth::check()): ?> search-header-after-login-w <?php else: ?> search-header-w <?php endif; ?>">
                        <div class="icon-search hidden-lg hidden-md"><i class="fa fa-search"></i></div>

                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <?php if(session()->has('error')): ?>

                                

                            <?php endif; ?>
                            <form id="keyword_search_form" method="get" action="<?php echo e(route('category_product_search')); ?>">

                                <div id="search0" class="search input-group form-group">
                                
                                   
                                    <input class="autosearch-input form-control" type="text" value="<?php echo e(app('request')->input('keyword_search')); ?>" id="keyword_search" size="50" autocomplete="off" placeholder="Keyword here..." name="keyword_search" id="keyword_search" autocomplete="off">
                                    <button type="submit" class="button-search btn btn-primary" name="submit_search" id="submit_search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if(Auth::check()): ?>
                        <div class="shopping_cart">
                            <div  class="btn-shopping-cart">
                              &nbsp;
                              <a href="javascript:void(0)" data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style=" padding-left:5px; padding-right: 10px;">
                                 <span style="height: 40px; width: 40px; border-radius: 5px;padding: 2px; display: inline-block;">
                                    <?php if(Auth::user()->photo): ?>
                                        <img src="<?php echo e(Storage::url(findSTPath(Auth::user()->photo))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="40" height="40">
                                    <?php else: ?>
                                        <img src="<?php echo e(Storage::url('public/media/image_icon/man.png')); ?>"  class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                                    <?php endif; ?>
                                 </span> 
                              <i class="fa fa-angle-down"></i>
                              </a>  
                              <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                 <li>
                                    <span style="height: 40px; width: 40px; border-radius: 5px;padding: 2px; display: inline-block;">
                                    <?php if(Auth::user()->photo): ?>
                                        <img src="<?php echo e(Storage::url(findSTPath(Auth::user()->photo))); ?>"  class="img-thumbnail" alt="Cinque Terre" width="40" height="40">
                                    <?php else: ?>
                                        <img src="<?php echo e(Storage::url('public/media/image_icon/man.png')); ?>"  class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                                    <?php endif; ?>
                                 </span>
                                <?php echo e(Auth::user()->fname." ".Auth::user()->lname); ?>

                                 </li>
                                 <li><a href="<?php echo e(route('user_dashboard')); ?>">Dashboard</a></li>
                                 <li><a href="<?php echo e(route('user_viewprofile')); ?>">View Profile</a></li>
                                 <li><a href="<?php echo e(route('user_changeup')); ?>">Change Password</a></li>
                                 <li><a href="<?php echo e(route('order_history')); ?>">Order History</a></li>
                                 <li><a href="<?php echo e(route('user_logout')); ?>">Logout</a> </li>
                              </ul>
                           </div>
                        </div>

                    <?php endif; ?>

                    <?php echo $__env->make('common.shoppingCart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(Auth::check()): ?>

                        <?php

                           $totalRecord = App\Http\Controllers\WishlistController::findTotalRecord(); 
                        ?>

                        <div class="wishlist hidden-md hidden-sm hidden-xs"><a href="<?php echo e(route('wishlist')); ?>" id="wishlist-total" class="top-link-wishlist" title="Wish List (<?php echo e($totalRecord); ?>) "><i class="fa fa-heart"></i></a></div>

                        <div class="wishlist hidden-md hidden-sm hidden-xs">
                            <a href="<?php echo e(route('coupon_list')); ?>" id="wishlist-total" class="top-link-wishlist" >
                                    <i class="fa fa-tag "></i>
                           </a>
                       </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-compact">
        <?php echo $__env->make('common.headerMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>       
    </div>
</header>

<script type="text/javascript">

 function change_segment(slug){

      //alert(slug);
      $.ajax({
           type: 'POST',
           url:  '/change_dropdown_segment',
           dataType: 'json',
           data:{'slug':slug,_token: '<?php echo e(csrf_token()); ?>'},
           beforeSend: function(){
               $('#ajax_brand_loader').show();
           },
           complete: function(){
               $('#ajax_brand_loader').hide();
           },
           success: function (data) {
              //console.log(data);
              $('#parent_segment').html(data.dropdown);
           },
           error: function (requestObj, textStatus, errorThrown) {
               console.log(requestObj);
           },
       });

   }    

</script><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/common/menu.blade.php ENDPATH**/ ?>