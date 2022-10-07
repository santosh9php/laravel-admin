

<?php $__env->startSection('body-content'); ?>

<?php if($page->slug == 'contact-us'): ?>


 


 

<div class="title_background">
   <h2>Contact us</h2>
   <ul class="breadcrumb">
       
      <li><?php echo $breadcrum; ?></li>
   </ul>
</div>
 
<div class="main-container container">
   <div class="row">
      <div id="content" class="col-sm-12">
         <?php echo $page->content; ?>

            <div class="col-lg-7 col-sm-8 col-xs-12 contact-form">
               <?php if(Session::has('success') || Session::has('error')): ?>
                  <div class="row page-titles mb-0 border-bottom mx-0">
                     <div class="col-sm-12 p-md-0">
                        <div class="welcome-text">
                           
                           <?php if(Session::has('success')): ?>
                              <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px; color: green;">  
                              <?php echo Session::get('success'); ?>

                              </h4>
                           <?php endif; ?>

                              <?php if(Session::has('error')): ?>
                                 <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px; color: red;">
                                 <?php echo Session::get('error'); ?>

                                 </h4>
                              <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php endif; ?>
               <form action="<?php echo e(route('static_page_contactus')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
               <?php echo csrf_field(); ?>   
                  
                  <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Name" id="name" class="form-control" required>

                  <?php if($errors->has('name')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                  <?php endif; ?>

                  <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="E-Mail Address" id="email" class="form-control" required>

                  <?php if($errors->has('email')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('email')); ?></p>
                  <?php endif; ?>

                  


                  <input type="text" name="part_name" value="<?php echo e(old('part_name')); ?>" placeholder="Spare Part Name" id="part_name" class="form-control" required>

                  <?php if($errors->has('part_name')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('part_name')); ?></p>
                  <?php endif; ?>

                     
                  <textarea name="message" rows="10"  placeholder="Message" id="input-enquiry" class="form-control" required><?php echo e(old('message')); ?></textarea>

                  <?php if($errors->has('message')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('message')); ?></p>
                  <?php endif; ?>


                  <?php if (isset($component)) { $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7 = $component; } ?>
<?php $component = $__env->getContainer()->make(Lukeraymonddowning\Honey\Views\Honey::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('honey'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Lukeraymonddowning\Honey\Views\Honey::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7)): ?>
<?php $component = $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7; ?>
<?php unset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7); ?>
<?php endif; ?>


                  <span id="captcha_reload"><?php echo captcha_img(); ?></span>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                  </button>

                   <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>

                   <?php if($errors->has('captcha')): ?>
                    <p class="text-danger mpg_input_error"><?php echo e($errors->first('captcha')); ?></p>
                    <br>
                  <?php endif; ?>

                     
                  <button class="btn blog-btn" type="submit">
                     Submit 
                  </button>
                     
               </form>
            </div>
         </div>
      </div>
   </div>
 

<br><br> 

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2081.9497901012464!2d77.19602529197509!3d28.647492946580964!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabdf3c40133110da!2sSK%20Exports!5e0!3m2!1sen!2sin!4v1659012173905!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<br><br> <br><br> 


<?php else: ?>

<div class="title_background">
   <h2>ABOUT us</h2>
    <ul class="breadcrumb">
             
            <li><?php echo $breadcrum; ?></li>
         </ul>
</div>


   <div class="main-container ">

      
      <?php echo $page->content; ?>


   </div>

   <br> <br>

<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js-script'); ?>

<script type="text/javascript">
    $('#reload').click(function () {
      var APP_URL = <?php echo json_encode(url('/')); ?>

        $.ajax({
            type: 'GET',
            url: APP_URL+'/reload-captcha',
            success: function (data) {
                $("#captcha_reload").html(data.captcha);
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/pageDetail.blade.php ENDPATH**/ ?>