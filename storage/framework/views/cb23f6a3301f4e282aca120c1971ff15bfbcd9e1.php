


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mx-0 mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit Body Part</h4>
            </div>
         </div>
         
      </div>
      
      <?php if(Session::has('success') || Session::has('error')): ?>

      <div class="row page-titles mx-0">
         <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
               
               <?php if(Session::has('success')): ?>
                  <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px;">  
                  <?php echo Session::get('success'); ?>

                  </h4>
               <?php endif; ?>

                  <?php if(Session::has('error')): ?>
                     <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px;">
                     <?php echo Session::get('error'); ?>

                     </h4>
                  <?php endif; ?>
               
            </div>
         </div>
         
      </div>

      <?php endif; ?>

      <div class="col-lg-12" id="bodypart_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_bodypart_show')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                           <div class="row"> 
                              <div class="mb-6 col-md-9">
                                 <div class="row">   
                                    <div class="mb-12 col-md-12"><div id="ajax_bodypart_edit_loader"></div></div>
                                 </div>
                                 
                                 <div class="row">
                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Name</label>
                                       <input type="text" class="form-control" placeholder="Name" value="<?php echo e(getFormEditValue($bodypart,'name')); ?>" name="name" id="name" required >
                                       <?php if($errors->has('name')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                                      <?php endif; ?>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Description</label>
                                       <textarea type="text" class="form-control" placeholder="Descriptions" name="description" id="description"><?php echo e(getFormEditValue($bodypart,'description')); ?></textarea>
                                       <?php if($errors->has('description')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <div class="basic-form custom_file_input">
                                          <label class="form-label">Image</label>
                                          <div class="input-group">
                                             <div class="form-file" style="padding-top:10px;padding-bottom:10px; border-radius: 0.5rem 0 0 0.5rem;">
                                                <input type="file" name="image" class="form-file-input form-control">
                                             </div>
                                             <span class="input-group-text">Upload</span>
                                             
                                          </div>
                                          <?php if($bodypart->image): ?>
                                             <img src="<?php echo e(Storage::url($bodypart->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /> 
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Image Attribute</label>
                                       <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(getFormEditValue($bodypart,'image_attr')); ?>">
                                       <?php if($errors->has('image_attr')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Title</label>
                                       <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(getFormEditValue($bodypart,'meta_title')); ?>">
                                       <?php if($errors->has('meta_title')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Keywords</label>
                                       <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(getFormEditValue($bodypart,'meta_keyword')); ?>">
                                       <?php if($errors->has('meta_keyword')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Description</label>
                                       <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(getFormEditValue($bodypart,'meta_desc')); ?>">
                                       <?php if($errors->has('meta_desc')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="<?php echo e(url(route('admin_bodypart_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                                    </div>
                                    <div class="col-md-6"></div>
                                 </div>
                              </div>
                              <div class="mb-6 col-md-3" style="overflow-y: scroll; height:800px;">

                                 <div class="row">
                                    <div class="mb-3 col-md-12">
                                       <label class="form-label">Vehicle Types</label>
                                       <select class="default-select  form-control wide show_brand_subc" name="category_id" id="category_id" onchange="return change_segment(this.value,<?php echo e($bodypart->parent_id); ?>)" required >
                                          <option value="" <?php if(getFormEditValue($bodypart,'category_id') == ""): ?> selected <?php endif; ?>>Select Vehicle Type</option>
                                             <?php if($bodypart_categories): ?>
                                                <?php $__currentLoopData = $bodypart_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php $dash=''; ?>
                                                   <option value="<?php echo e($category->id); ?>" <?php if(getFormEditValue($bodypart,'category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                                  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>

                                       </select>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="mb-3 col-md-12">
                                       <div id="parent_bodypart">
                                          <label class="form-label">Parent Body Parts</label>
                                          <?php
                                             $cat_parents = array();
                                             $cat_parents = App\Http\Controllers\Admin\BodypartController::getAllPrents(getFormEditValue($bodypart,'parent_id'));
                                          ?>

                                          <?php if($bodyparts): ?>
                                             <?php $__currentLoopData = $bodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart_edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <ul id="myUL">
                                                   <li>
                                                      <?php if(count($bodypart_edit->subBodypart)): ?>
                                                         <div class="caret open  <?php if(in_array($bodypart_edit->id,$cat_parents) or in_array(old('parent_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                                      <?php else: ?>
                                                         <div class="uncaret open">
                                                      <?php endif; ?>
                                                      <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="<?php echo e($bodypart_edit->id); ?>" <?php if($bodypart_edit->id == getFormEditValue($bodypart,'parent_id')): ?> checked <?php endif; ?> >&nbsp;<?php echo e($bodypart_edit->name); ?></div>
                                                      
                                                         <?php if(count($bodypart_edit->subBodypart)): ?>
                                                         <ul class="nested  <?php if(in_array($bodypart_edit->id,$cat_parents)): ?>   active <?php endif; ?>">
                                                            <?php echo $__env->make('admin.subBodyPart.subBodyPart_editform',['subbodyparts' => $bodypart_edit->subBodypart,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                         </ul>
                                                         <?php endif; ?>
                                                      
                                                   </li>
                                                </ul>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                         
                                       </div>
                                    </div>
                                 </div>

                              </div>
                        </div>
                     </div>
                     <input type="hidden" name="bodypart_id" value="<?php echo e($bodypart->id); ?>">
                  </form>   
               </div>
            </div>
         </div>
      </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>

<script language="javascript">
   function form_check(){
      var category_id = $("#category_id").val();
      if(category_id == ''){
         alert("Please select the vehicle type");
         return false;
      }
      return true;
   }

   function change_segment(category,bodypart){

      //alert(category);
      $.ajax({
           type: 'POST',
           url:  '/admin/edit_change_dropdown_bodypart',
           dataType: 'json',
           data:{'category':category,'bodypart':bodypart,_token: '<?php echo e(csrf_token()); ?>'},
           beforeSend: function(){
               $('#ajax_bodypart_edit_loader').show();
           },
           complete: function(){
               $('#ajax_bodypart_edit_loader').hide();
           },
           success: function (data) {
              //console.log(data);
              $('#parent_bodypart').html(data.dropdown);
              $('.default-select').selectpicker('refresh');

              //For Tree view of category
                  var toggler = document.getElementsByClassName("caret");
                  var i;
                  for (i = 0; i < toggler.length; i++) {
                    toggler[i].addEventListener("click", function() {
                      this.parentElement.querySelector(".nested").classList.toggle("active");
                      this.classList.toggle("caret-down");
                    });
                  }
               //End of tree view

               $('#parent_bodypart input:checkbox').click(function() {
                  $('#parent_bodypart input:checkbox').not(this).prop('checked', false);
               });

           },
           error: function (requestObj, textStatus, errorThrown) {
               console.log(requestObj);
           },
       });

   }

   //For Tree view of category
      var toggler = document.getElementsByClassName("caret");
      var i;
      for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
          this.parentElement.querySelector(".nested").classList.toggle("active");
          this.classList.toggle("caret-down");
        });
      }
   //End of tree view

   $(document).ready(function(){

      $('#parent_bodypart input:checkbox').click(function() {
         $('#parent_bodypart input:checkbox').not(this).prop('checked', false);
      });
   })

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/bodypart_edit.blade.php ENDPATH**/ ?>