<?php
    if(!isset($title) or $title == ''){ $title =  'SK Motor'; }
    if(!isset($keyword) or $keyword == ''){ $keyword =  ''; }
    if(!isset($description) or $description == ''){ $description =  ''; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<title><?php echo e($title); ?></title>
<meta charset="utf-8">
<meta name="keywords" content="<?php echo e($keyword); ?>" />
<meta name="description" content="<?php echo e($description); ?>" />
<meta name="author" content="">
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="<?php echo e(asset('frontend_assets/css/bootstrap.min.css')); ?>"> 
<link href="<?php echo e(asset('frontend_assets/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/owl.carousel.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/slick.css')); ?>" rel="stylesheet"> 
<link href="<?php echo e(asset('frontend_assets/css/lib.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so_searchpro.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so_megamenu.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so-categories.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so-listing-tabs.css')); ?>" rel="stylesheet"> 
<link href="<?php echo e(asset('frontend_assets/css/so-newletter-popup.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so-latest-blog.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/footer3.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/header3.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/home3.css')); ?>" rel="stylesheet" id="color_scheme">
<link href="<?php echo e(asset('frontend_assets/css/responsive.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/jquery-ui.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/miniColors.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/so-deals.css')); ?>" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link href="<?php echo e(asset('frontend_assets/css/custom.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('frontend_assets/css/so_advanced_search.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('frontend_assets/css/theme.css')); ?>" rel="stylesheet">  
<link href="<?php echo e(asset('frontend_assets/css/lightslider.css')); ?>" rel="stylesheet"> 



</head>
<body class="common-home res layout-3">
    <div id="wrapper" class="wrapper-fluid banners-effect-1"> <?php /**PATH C:\xampp\htdocs\skmotor\resources\views/common/header.blade.php ENDPATH**/ ?>