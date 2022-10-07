<?php
$dashboard_routes = ['admin_dashboard'];

$category_routes = ['admin_category_show', 'admin_category_edit'];

$brand_routes = ['admin_brand_show', 'admin_brand_edit'];

$bodypart_active_routes = ['admin_bodypart_show','admin_bodypart_edit'];

$product_active_routes = ['admin_product_show','admin_product_edit','admin_product_form_show'];

$page_active_routes = ['admin_page_show','admin_page_edit','admin_page_form_show'];

$news_subs_active_routes = ['admin_news_subs_show'];

$cont_users_active_routes = ['admin_cont_users_show'];

$blog_category_active_routes = ['admin_blog_category_show','admin_blog_category_edit'];

$blog_post_active_routes = ['admin_blog_post_show','admin_blog_post_edit','admin_blog_post_form_show'];

$faq_category_active_routes = ['admin_faq_category_show','admin_faq_category_edit'];

$faq_active_routes = ['admin_faq_show','admin_faq_edit','admin_faq_form_show'];

$admin_user_active_routes = ['admin_user_show','admin_user_form_show','admin_post_user_show', 'admin_user_edit','admin_put_user_show','admin_delete_user_show'];

$dealer_user_active_routes = ['admin_dealer_user_show','admin_dealer_user_form_show','admin_post_dealer_user_show', 'admin_dealer_user_edit','admin_put_dealer_user_show','admin_delete_dealer_user_show'];

$coupon_active_routes = ['admin_coupon_show','admin_coupon_form_show','admin_post_coupon_show', 'admin_coupon_edit','admin_put_coupon_show','admin_delete_coupon_show'];

$order_active_routes = ['admin_order_show','admin_order_edit','admin_put_order_show', 'admin_delete_order_show'];

?>


 

        



  <div class="deznav">
            <div class="deznav-scroll">
     
        <ul class="metismenu" id="menu">
          <li class="nav-label first">Main Menu</li>

            <li class="border-bottom  <?php echo e(left_menu_active($dashboard_routes)); ?>">
            <a href="<?php echo e(route('admin_dashboard')); ?>" class="ai-icon">
              <i class="fas fa-clock"></i> 
              <span class="nav-text"> Dashboard</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($order_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_order_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa-brands fa-first-order"></i>
              <span class="nav-text">Orders</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($admin_user_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_user_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-user"></i>
              <span class="nav-text">Admin Users</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($dealer_user_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_dealer_user_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-user"></i>
              <span class="nav-text">Dealer Users</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($coupon_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_coupon_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-gift"></i>
              <span class="nav-text">Coupons</span>
            </a>
          </li>

          

          <li class="border-bottom  <?php echo e(left_menu_active($category_routes)); ?>">
            <a href="<?php echo e(route('admin_category_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fas fa-bicycle"></i> 
              <span class="nav-text">Vehicle Types</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($brand_routes)); ?> ">
            <a href="<?php echo e(route('admin_brand_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <span class="nav-text"> Segments</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($bodypart_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_bodypart_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fas fa-wrench"></i> 
              <span class="nav-text"> Body Parts</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($product_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_product_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-product-hunt"></i>
              <span class="nav-text">Products</span>
            </a>
          </li>

          

          <li class="border-bottom <?php echo e(left_menu_active($blog_category_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_blog_category_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class='fab fa-blogger-b'></i>
              <span class="nav-text">Blog Categories</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($blog_post_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_blog_post_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class='fab fa-blogger-b'></i>
              <span class="nav-text">Blog Posts</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($faq_category_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_faq_category_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-question-circle"></i>
              <span class="nav-text">FAQ Categories</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($faq_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_faq_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-question-circle"></i>
              <span class="nav-text">FAQS</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($page_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_page_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fas fa-book"></i> 
              <span class="nav-text">Pages</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($news_subs_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_news_subs_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fa fa-envelope"></i>
              <span class="nav-text">Newsletter Subscribers</span>
            </a>
          </li>

          <li class="border-bottom <?php echo e(left_menu_active($cont_users_active_routes)); ?> ">
            <a href="<?php echo e(route('admin_cont_users_show')); ?>" class="ai-icon "  aria-expanded="false">
              <i class="fas fa-address-book"></i> 
              <span class="nav-text">Contact Us </span>
            </a>
          </li>

          




<!--
          <li class="border-bottom mb-2">
            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
              <i class="flaticon-381-settings-2"></i>
              <span class="nav-text">Warehouse Management</span>
            </a>
          </li>


          <li class="border-bottom mb-2">
            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
              <i class="flaticon-381-network"></i>
              <span class="nav-text">Stone Management</span>
            </a>
          </li>

          <li class="border-bottom mb-2">
            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
              <i class="flaticon-049-copy"></i>
              <span class="nav-text">Dealer  Management</span>
            </a>
          </li>

-->
        </ul>
        
      </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
    <!--**********************************
            Content body start
        ***********************************-->

<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/left_menu.blade.php ENDPATH**/ ?>