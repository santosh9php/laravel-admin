<div class="card" id="bodypart_add_model" >
   <div class="card-header">
      <h4 class="card-title">Add Body Part</h4>
      <!--   <div class="float-left"></div>
         <div class="float-right text-right">asdfsad</div>
         <div class="clearfix"></div> -->
   </div>

   <div class="card-body" >
      <form action="<?php echo e(route('admin_post_bodypart_show')); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_check()">
      <?php echo csrf_field(); ?>
         <div class="basic-form">
            <div class="row"> 
               <div class="mb-6 col-md-9">
                  
                  <div class="row">

                     
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>" name="name" required >
                        <?php if($errors->has('name')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                       <?php endif; ?>
                     </div>
                     
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" placeholder="Descriptions" name="description"><?php echo e(old('description')); ?></textarea>
                        <?php if($errors->has('description')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
                       <?php endif; ?>
                     </div>

                     <div class="mb-3 col-md-4">
                        <div class="basic-form custom_file_input">
                           <label class="form-label">Image</label>
                           <div class="input-group">
                              <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                 <input type="file" class="form-file-input form-control" name="image" >
                                 <?php if($errors->has('image')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('image')); ?></p>
                                <?php endif; ?>
                              </div>
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     

                   </div>
                   <div class="row">
                     
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Image Attribute</label>
                        <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(old('image_attr')); ?>">
                        <?php if($errors->has('image_attr')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                       <?php endif; ?>
                     </div>
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
                        <?php if($errors->has('meta_title')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                       <?php endif; ?>
                     </div>
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(old('meta_keyword')); ?>">
                        <?php if($errors->has('meta_keyword')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                       <?php endif; ?>
                     </div>

                     
                     
                     </div>
                     <div class="row">

                        <div class="mb-3 col-md-4">
                           <label class="form-label">Meta Description</label>
                           <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(old('meta_desc')); ?>">
                           <?php if($errors->has('meta_desc')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                          <?php endif; ?>
                        </div>

                        <?php /* ?>
                        
                        <div class="mb-3 col-md-3">
                             <label class="form-label">Status</label>
                             <select class="default-select  form-control wide" name="status">
                                <option value="">Choose Status</option>
                                <option value="active" @if(old('status') == "active" || old('status') == "") selected @endif>Active</option>
                                <option value="inactive" @if(old('status') == "inactive") selected @endif>Inactive</option>
                             </select>
                             @if ($errors->has('status'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                             @endif
                        </div>

                        <?php */ ?>

                   </div>

                  <div class="row">
                      <div class="col-md-12">&nbsp;</div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="#"  class="btn btn-danger" id="bodypart_hide_form">Hide Form</a>
                     </div>
                     
                  </div>
               </div>
               <div class="mb-6 col-md-3" style="overflow-y: scroll; height:400px;">
                  <div class="row">   
                     <div class="mb-12 col-md-12"><div id="ajax_bodypart_add_loader"></div></div>
                  </div>
                  <div class="row">

                     <div class="mb-3 col-md-12">
                        <label class="form-label">Vehicle Types</label>
                        <select class="default-select  form-control wide show_brand_subc" name="category_id" id="category_id" onchange="return change_segment(this.value)" required >
                           <option value="" <?php if(old('category_id') == ""): ?> selected <?php endif; ?>>Select Vehicle Type</option>
                              <?php if($bodypart_categories): ?>
                                 <?php $__currentLoopData = $bodypart_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $dash=''; ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                   
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>

                        </select>
                     </div>

                     <div class="mb-3 col-md-12">
                        <div id="parent_bodypart">

                           <?php
                              $cat_parents = array();
                              if(old('category_id') !== 'null' and old('category_id') != ''){
                                 echo '<label class="form-label">Parent Body Part</label>';
                                 $cat_parents = App\Http\Controllers\Admin\BodypartController::getAllPrents(old('parent_id'));
                                 
                              }
                           ?>
                           <?php if($bodyparts &&  old('category_id') !== 'null' and old('category_id') != ''): ?>
                              <?php $__currentLoopData = $bodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <ul id="myUL">
                                    <li>
                                       <?php if(count($bodypart->subBodypart)): ?>
                                          <div class="caret open  <?php if(in_array($bodypart->id,$cat_parents) or in_array(old('parent_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                       <?php else: ?>
                                          <div class="uncaret open">
                                       <?php endif; ?>
                                       <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="<?php echo e($bodypart->id); ?>" <?php if(old('parent_id') == $bodypart->id): ?> checked <?php endif; ?> >&nbsp;<?php echo e($bodypart->name); ?></div>
                                       
                                          <?php if(count($bodypart->subBodypart)): ?>
                                          <ul class="nested  <?php if(in_array($bodypart->id,$cat_parents)): ?>   active <?php endif; ?>">
                                             <?php echo $__env->make('admin.subBodyPart.subBodyPart_addform',['subbodyparts' => $bodypart->subBodypart,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                          </ul>
                                          <?php endif; ?>
                                       
                                    </li>
                                 </ul>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>
                        <?php if($errors->has('parent_id')): ?>
                         <p class="text-danger mpg_input_error"><?php echo e($errors->first('parent_id')); ?></p>
                       <?php endif; ?>
                     </div>

                  </div>

               </div>

            </div>

         </div>
      </form>
   </div>

</div>
<script language="javascript">
   function form_check(){
      var category_id = $("#category_id").val();
      if(category_id == ''){
         alert("Please select the vehicle type");
         return false;
      }
      return true;
   }

   function change_segment(category){

      //alert(category);
      $.ajax({
           type: 'POST',
           url:  '/admin/change_dropdown_bodypart',
           dataType: 'json',
           data:{'category':category,_token: '<?php echo e(csrf_token()); ?>'},
           beforeSend: function(){
               $('#ajax_bodypart_add_loader').show();
           },
           complete: function(){
               $('#ajax_bodypart_add_loader').hide();
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

</script>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/bodypart_add.blade.php ENDPATH**/ ?>