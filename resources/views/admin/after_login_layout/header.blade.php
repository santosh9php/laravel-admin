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
      <title>{{$title}}</title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_assets/images/favicon.png')}}">
      <link rel="stylesheet" href="{{asset('admin_assets/css/chartist.min.css')}}">
      <link href="{{asset('admin_assets/css/jquery.dataTables.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin_assets/css/bootstrap-select.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin_assets/css/owl.carousel.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('admin_assets/css/select2.min.css')}}">
      <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('admin_assets/css/customTG.css')}}" rel="stylesheet">
      <link href="{{asset('admin_assets/css/fontawesome/css/all.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('admin_assets/css/default.css')}}">
      <link rel="stylesheet" href="{{asset('admin_assets/css/default.date.css')}}"> 
        
      
    
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
         <a href="{{route('admin_dashboard')}}" class="brand-logo">
         <img src="{{asset('admin_assets/images/logo.png')}}" alt="">
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
                     @auth
                     <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                           @if(auth()->user()->photo == null)
                              <img src="{{asset('admin_assets/images/profile/user_avatar.jpg')}}" width="20" alt=""/>
                           @else
                              <img src="{{Storage::url(findSTPath(auth()->user()->photo))}}"  width="20" alt=""/>
                           @endif
                           <div class="header-info">
                              <span>{{ auth()->user()->fname." ".auth()->user()->lname }}</span>
                                 <?php
                                   $userRole = auth()->user()->roles->pluck('name','name')->all();
                                 ?>
                                 @if($userRole)
                                    @foreach($userRole as $role)
                                       <span  style="font-size: 12px;color: #666666;">({{$role}})</span>
                                    @endforeach
                                 @endif
                           </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a href="{{ route('admin_viewprofile') }}" class="dropdown-item ai-icon">
                              <i class="fa fa-user-circle"></i>
                              <span class="ms-2">Profile </span>
                           </a>

                           <a href="{{ route('admin_changeup') }}" class="dropdown-item ai-icon">
                              <i class="fa fa-key"></i>
                              <span class="ms-2">Change Password </span>
                           </a>

                           <a href="{{ route('admin_logout') }}" class="dropdown-item ai-icon">
                              <i class="fa fa-lock"></i>
                              <span class="ms-2">Logout </span>
                           </a>
                        </div>
                     </li>
                     @endauth
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
