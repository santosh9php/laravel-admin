


<?php $__env->startSection('body-content'); ?>
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit Segment</h4>
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

      <div class="col-lg-12" id="brand_add_model" >
               <div class="card">
                  <form action="<?php echo e(route('admin_put_brand_show')); ?>" method="post" enctype="multipart/form-data" onsubmit="return form_check()">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                     <div class="card-body">
                        <div class="basic-form">
                           <div class="row"> 
                              <div class="mb-6 col-md-9">
                                 <div class="row">   
                                    <div class="mb-12 col-md-12"><div id="ajax_brand_edit_loader"></div></div>
                                 </div>
                                 <div class="row">

                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Name</label>
                                       <input type="text" class="form-control" placeholder="Name" value="<?php echo e(getFormEditValue($brand,'name')); ?>" name="name" id="name" required >
                                       <?php if($errors->has('name')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                                      <?php endif; ?>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Description</label>
                                       <textarea type="text" class="form-control" placeholder="Descriptions" name="description" id="description"><?php echo e(getFormEditValue($brand,'description')); ?></textarea>
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
                                          <?php if($brand->image): ?>
                                             <img src="<?php echo e(Storage::url($brand->image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" /> 
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Image Attribute</label>
                                       <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(getFormEditValue($brand,'image_attr')); ?>">
                                       <?php if($errors->has('image_attr')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Title</label>
                                       <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(getFormEditValue($brand,'meta_title')); ?>">
                                       <?php if($errors->has('meta_title')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Keywords</label>
                                       <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(getFormEditValue($brand,'meta_keyword')); ?>">
                                       <?php if($errors->has('meta_keyword')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                       <label class="form-label">Meta Description</label>
                                       <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(getFormEditValue($brand,'meta_desc')); ?>">
                                       <?php if($errors->has('meta_desc')): ?>
                                        <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="<?php echo e(url(route('admin_brand_show').get_edit_redirect_query_string())); ?>" class="btn btn-danger">Back</a>
                                    </div>
                                    <div class="col-md-6">
                                    
                                    </div>
                                 </div>
                              </div>
                              <div class="mb-6 col-md-3" style="overflow-y: scroll; height:800px;">
                                 <div class="row">
                                    <div class="mb-3 col-md-12">
                                       <label class="form-label">Vehicle Types</label>
                                       <select class="default-select  form-control wide show_brand_subc" name="category_id" id="category_id" onchange="return change_segment(this.value,<?php echo e($brand->parent_id); ?>)" required >
                                          <option value="" <?php if(getFormEditValue($brand,'category_id') == ""): ?> selected <?php endif; ?>>Select Vehicle Type</option>
                                             <?php if($brand_categories): ?>
                                                <?php $__currentLoopData = $brand_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php $dash=''; ?>
                                                   <option value="<?php echo e($category->id); ?>" <?php if(getFormEditValue($brand,'category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                                  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>

                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="mb-3 col-md-12">

                                       <div id="parent_segment">
                                          <label class="form-label">Parent Segments</label>
                                          <?php
                                             $cat_parents = array();
                                             $cat_parents = App\Http\Controllers\Admin\BrandController::getAllPrents(getFormEditValue($brand,'parent_id'));
                                          ?>

                                          <?php if($brands): ?>
                                             <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <ul id="myUL">
                                                   <li>
                                                      <?php if(count($brand_edit->subBrand)): ?>
                                                         <div class="caret open  <?php if(in_array($brand_edit->id,$cat_parents) or in_array(old('parent_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                                      <?php else: ?>
                                                         <div class="uncaret open">
                                                      <?php endif; ?>
                                                      <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="<?php echo e($brand_edit->id); ?>" <?php if($brand_edit->id == getFormEditValue($brand,'parent_id')): ?> checked <?php endif; ?> >&nbsp;<?php echo e($brand_edit->name); ?></div>
                                                      
                                                         <?php if(count($brand_edit->subBrand)): ?>
                                                         <ul class="nested  <?php if(in_array($brand_edit->id,$cat_parents)): ?>   active <?php endif; ?>">
                                                            <?php echo $__env->make('admin.subBrand.subBrand_editform',['subbrands' => $brand_edit->subBrand,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                           <input type="hidden" name="brand_id" value="<?php echo e($brand->id); ?>">
                        </div>
                     </div>
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

   function change_segment(category,brand){

      //alert(category);
      $.ajax({
           type: 'POST',
           url:  '/admin/edit_change_dropdown_segment',
           dataType: 'json',
           data:{'category':category,'brand':brand,_token: '<?php echo e(csrf_token()); ?>'},
           beforeSend: function(){
               $('#ajax_brand_edit_loader').show();
           },
           complete: function(){
               $('#ajax_brand_edit_loader').hide();
           },
           success: function (data) {
              //console.log(data);
              $('#parent_segment').html(data.dropdown);
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

                $('#parent_segment input:checkbox').click(function() {
                  $('#parent_segment input:checkbox').not(this).prop('checked', false);
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

      $('#parent_segment input:checkbox').click(function() {
         $('#parent_segment input:checkbox').not(this).prop('checked', false);
      });
   })

</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/brand_edit.blade.php ENDPATH**/ ?>