<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta charset="utf-8">
      <meta name="keywords" content="" />
      <meta name="author" content="" />
      <meta name="robots" content="" />
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="description" content="S.K. Distributors Dashboard " />
      <meta property="og:title" content="S.K. Distributors Dashboard " />
      <meta property="og:description" content="S.K. Distributors Dashboard " />
      <meta name="format-detection" content="telephone=no">
      <title><?php echo e($title); ?></title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('admin_assets/images/favicon.png')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/chartist.min.css')); ?>">
      <link href="<?php echo e(asset('admin_assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('admin_assets/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('admin_assets/css/owl.carousel.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/select2.min.css')); ?>">
      <link href="<?php echo e(asset('admin_assets/css/style.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('admin_assets/css/customTG.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('admin_assets/css/fontawesome/css/all.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/default.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/default.date.css')); ?>"> 
        
      
    
   </head>
   <body>








 
      <!--*******************
         Preloader start
         ********************-->
      <div id="preloader">
         <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
         </div>
      </div>
      <!--*******************
         Preloader end
         ********************-->
      <!--**********************************
         Main wrapper start
         ***********************************-->
      <div id="main-wrapper">
      <!--**********************************
         Nav header start
         ***********************************-->
      <div class="nav-header">
         <a href="<?php echo e(route('admin_dashboard')); ?>" class="brand-logo">
         <img src="<?php echo e(asset('admin_assets/images/logo.png')); ?>" alt="">
         <span class="brand-title" style="color:#000; font-size:20px; line-height: 20px;">S.K. 
         Distributors</span>
         </a>
         <div class="nav-control">
            <div class="hamburger">
               <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
         </div>
      </div>
      <!--**********************************
         Nav header end
         ***********************************-->
      <!--**********************************
         Header start
         ***********************************-->
      <div class="header">
         <div class="header-content">
            <nav class="navbar navbar-expand">
               <div class="collapse navbar-collapse justify-content-between">
                  <div class="header-left">
                    
                  </div>
                  <ul class="navbar-nav header-right main-notification">
                     <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-fullscreen" href="#">
                           <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                              <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                           </svg>
                           <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
                              <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                           </svg>
                        </a>
                     </li>
                     <?php if(auth()->guard()->check()): ?>
                     <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                           <?php if(auth()->user()->photo == null): ?>
                              <img src="<?php echo e(asset('admin_assets/images/profile/user_avatar.jpg')); ?>" width="20" alt=""/>
                           <?php else: ?>
                              <img src="<?php echo e(Storage::url(findSTPath(auth()->user()->photo))); ?>"  width="20" alt=""/>
                           <?php endif; ?>
                           <div class="header-info">
                              <span><?php echo e(auth()->user()->fname." ".auth()->user()->lname); ?></span>
                                 <?php
                                   $userRole = auth()->user()->roles->pluck('name','name')->all();
                                 ?>
                                 <?php if($userRole): ?>
                                    <?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <span  style="font-size: 12px;color: #666666;">(<?php echo e($role); ?>)</span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                           </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a href="<?php echo e(route('admin_viewprofile')); ?>" class="dropdown-item ai-icon">
                              <i class="fa fa-user-circle"></i>
                              <span class="ms-2">Profile </span>
                           </a>

                           <a href="<?php echo e(route('admin_changeup')); ?>" class="dropdown-item ai-icon">
                              <i class="fa fa-key"></i>
                              <span class="ms-2">Change Password </span>
                           </a>

                           <a href="<?php echo e(route('admin_logout')); ?>" class="dropdown-item ai-icon">
                              <i class="fa fa-lock"></i>
                              <span class="ms-2">Logout </span>
                           </a>
                        </div>
                     </li>
                     <?php endif; ?>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!--**********************************
         Header end ti-comment-alt
         ***********************************-->
      <!--**********************************
         Sidebar start
         ***********************************-->
<?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/after_login_layout/header.blade.php ENDPATH**/ ?>