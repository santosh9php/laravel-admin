<?php
$dashboard_routes = ['admin_dashboard'];

$category_routes = ['admin_category_show', 'admin_category_edit'];

$product_active_routes = ['admin_product_show','admin_product_edit','admin_product_form_show'];

$page_active_routes = ['admin_page_show','admin_page_edit','admin_page_form_show'];

$news_subs_active_routes = ['admin_news_subs_show'];

$cont_users_active_routes = ['admin_cont_users_show'];

$blog_category_active_routes = ['admin_blog_category_show','admin_blog_category_edit'];

$blog_post_active_routes = ['admin_blog_post_show','admin_blog_post_edit','admin_blog_post_form_show'];

$faq_category_active_routes = ['admin_faq_category_show','admin_faq_category_edit'];

$faq_active_routes = ['admin_faq_show','admin_faq_edit','admin_faq_form_show'];

$admin_user_active_routes = ['admin_user_show','admin_user_form_show','admin_post_user_show', 'admin_user_edit','admin_put_user_show','admin_delete_user_show'];

$role_active_routes = ['admin_role_show','admin_post_role_show','admin_role_edit', 'admin_put_role_show','admin_delete_role_show'];


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

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-list','role-add','role-edit','role-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($role_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_role_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa-brands fa-first-order"></i>
                <span class="nav-text">Roles</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-list','user-add','user-edit','user-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($admin_user_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_user_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa fa-user"></i>
                <span class="nav-text">Users</span>
              </a>
            </li>
            
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['category-list','category-add','category-edit','category-delete'])): ?>

            <li class="border-bottom  <?php echo e(left_menu_active($category_routes)); ?>">
              <a href="<?php echo e(route('admin_category_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fas fa-list-alt"></i> 
                <span class="nav-text">Categories</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['product-list','product-add','product-edit','product-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($product_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_product_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa fa-product-hunt"></i>
                <span class="nav-text">Products</span>
              </a>
            </li>
            
          <?php endif; ?> 


          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blog-category-list','blog-category-add','blog-category-edit','blog-category-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($blog_category_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_blog_category_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class='fab fa-blogger-b'></i>
                <span class="nav-text">Blog Categories</span>
              </a>
            </li>

          <?php endif; ?> 

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blog-post-list','blog-post-add','blog-post-edit','blog-post-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($blog_post_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_blog_post_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class='fab fa-blogger-b'></i>
                <span class="nav-text">Blog Posts</span>
              </a>
            </li>

          <?php endif; ?> 

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['faq-category-list','faq-category-add','faq-category-edit','faq-category-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($faq_category_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_faq_category_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa fa-question-circle"></i>
                <span class="nav-text">FAQ Categories</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['faq-list','faq-add','faq-edit','faq-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($faq_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_faq_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa fa-question-circle"></i>
                <span class="nav-text">FAQS</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['page-list','page-add','page-edit','page-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($page_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_page_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fas fa-book"></i> 
                <span class="nav-text">Pages</span>
              </a>
            </li>

          <?php endif; ?>


          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletter-list', 'newsletter-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($news_subs_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_news_subs_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <span class="nav-text">Newsletter Subscribers</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['contact-us-enquiry-list', 'contact-us-enquiry-delete'])): ?>

            <li class="border-bottom <?php echo e(left_menu_active($cont_users_active_routes)); ?> ">
              <a href="<?php echo e(route('admin_cont_users_show')); ?>" class="ai-icon "  aria-expanded="false">
                <i class="fas fa-address-book"></i> 
                <span class="nav-text">Contact Us </span>
              </a>
            </li>

          <?php endif; ?>

        </ul>
        
      </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
    <!--**********************************
            Content body start
        ***********************************-->

<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/left_menu.blade.php ENDPATH**/ ?>