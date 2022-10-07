



<?php $__env->startSection('body-content'); ?>

  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add Product</h4>
            </div>
         </div>
         
      </div>
      
      

      <div class="col-lg-12" id="bodypart_add_model" >
         <div class="card">
            <form action="<?php echo e(route('admin_post_product_show')); ?>" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
            <?php echo csrf_field(); ?>
               <div class="card-body">
                  <div class="basic-form">

                     <?php if(Session::has('success') || Session::has('error')): ?>

                        <div class="row ">
                           <div class="col-sm-12">
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
                                 <label class="form-label">Part No.</label>
                                 <input type="text" class="form-control" placeholder="Part No." value="<?php echo e(old('part_no')); ?>" name="part_no" required >
                                 <?php if($errors->has('part_no')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('part_no')); ?></p>
                                <?php endif; ?>
                              </div>


                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Regular Price</label>
                                 <input type="number" class="form-control" placeholder="Regular Price" value="<?php echo e(old('regular_price')); ?>" name="regular_price" step=".01" >
                                 <?php if($errors->has('regular_price')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('regular_price')); ?></p>
                                <?php endif; ?>
                              </div>

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Sale Price</label>
                                 <input type="number" class="form-control" placeholder="Sale Price" value="<?php echo e(old('sale_price')); ?>" name="sale_price" step=".01" >
                                 <?php if($errors->has('sale_price')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('sale_price')); ?></p>
                                <?php endif; ?>
                              </div>

                              
                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Brand</label>
                                 <input type="text" class="form-control" placeholder="Brand" value="<?php echo e(old('brand')); ?>" name="brand" >
                                 <?php if($errors->has('brand')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('brand')); ?></p>
                                <?php endif; ?>
                              </div>

                             

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Package Includes</label>
                                 <input type="text" class="form-control" placeholder="Package Includes" value="<?php echo e(old('package_include')); ?>" name="package_include" >
                                 <?php if($errors->has('package_include')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('package_include')); ?></p>
                                <?php endif; ?>
                              </div>

                              

                           
                              <!--

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Quantity" value="<?php echo e(old('quantity')); ?>" name="quantity" >
                                    <?php if($errors->has('quantity')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('quantity')); ?></p>
                                   <?php endif; ?>
                                 </div>

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Compatible</label>
                                    <input type="text" class="form-control" placeholder="Compatible" value="<?php echo e(old('compatible')); ?>" name="compatible" >
                                    <?php if($errors->has('compatible')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('compatible')); ?></p>
                                   <?php endif; ?>
                                 </div>

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Colour</label>
                                    <input type="text" class="form-control" placeholder="Colour" value="<?php echo e(old('colour')); ?>" name="colour" >
                                    <?php if($errors->has('colour')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('colour')); ?></p>
                                   <?php endif; ?>
                                 </div>

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Weight</label>
                                    <input type="text" class="form-control" placeholder="Weight" value="<?php echo e(old('weight')); ?>" name="weight" >
                                    <?php if($errors->has('weight')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('weight')); ?></p>
                                   <?php endif; ?>
                                 </div>

                              -->

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Image Attribute</label>
                                 <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(old('image_attr')); ?>">
                                 <?php if($errors->has('image_attr')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                                <?php endif; ?>
                                 
                              </div>

                              <div class="mb-3 col-md-4">
                                 <div class="form-group">
                                        <label class="mb-1">Featured product:</label><br />
                                       <label class="radio-inline mr-3">
                                           <input type="radio" name="featured" value="1" <?php if(old('featured') == 1): ?> checked <?php endif; ?>>  Yes  </label>&nbsp;&nbsp;
                                       <label class="radio-inline mr-3">
                                           <input type="radio" name="featured" value="0" <?php if(old('featured') == 0 or old('featured') === null): ?> checked <?php endif; ?>> No</label> 
                                       <?php if($errors->has('featured')): ?>
                                           <p class="text-danger mpg_input_error"><?php echo e($errors->first('featured')); ?></p>
                                       <?php endif; ?>

                                 </div>
                              </div>

                           </div>
                           <div class="row increment multiple_image_upload">

                              <div class="mb-3 col-md-8">
                                 <div class="basic-form custom_file_input">
                                    <label class="form-label">Image</label>
                                    <div class="input-group">
                                       <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                          <input type="file" class="form-file-input form-control" name="images[]" >
                                       </div>
                                       <span class="input-group-text">Upload</span>
                                    </div>
                                 </div>
                              </div>

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">&nbsp;</label>
                                 <div class="input-group-btn"> 
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                 </div>
                              </div>

                           </div>

                           <div class="row clone multiple_image_hide">
                              <div class="row multiple_image_parent">
                                 <div class="mb-3 col-md-8">

                                    <div class="basic-form custom_file_input">
                                       <div class="input-group">
                                          <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                             <input type="file" class="form-file-input form-control" name="images[]" >
                                          </div>
                                          <span class="input-group-text">Upload</span>
                                       </div>
                                    </div>
                                 
                                 </div>
                                 <div class="mb-3 col-md-4"> 
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                 </div>  
                              </div> 

                           </div>

                           <div class="row">

                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Short Description</label>
                                 <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Descriptions" name="short_description"><?php echo e(old('short_description')); ?></textarea>
                                 <?php if($errors->has('short_description')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('short_description')); ?></p>
                                 <?php endif; ?>
                              </div>
                              
                           </div>
                           <div class="row">

                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Long Description</label>
                                 <textarea type="text" class="form-control ckeditor-textarea" placeholder="Long Descriptions" name="long_description"><?php echo e(old('long_description')); ?></textarea>
                                 <?php if($errors->has('long_description')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('long_description')); ?></p>
                                 <?php endif; ?>
                              </div>

                           </div>
                           <div class="row">

                              <div class="mb-3 col-md-3">
                                 <label class="form-label">Meta Title</label>
                                 <input type="text" class="form-control" placeholder="Title" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
                                 <?php if($errors->has('meta_title')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_title')); ?></p>
                                <?php endif; ?>
                              </div>

                              <div class="mb-3 col-md-3">
                                 <label class="form-label">Meta Keywords</label>
                                 <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="<?php echo e(old('meta_keyword')); ?>">
                                 <?php if($errors->has('meta_keyword')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_keyword')); ?></p>
                                <?php endif; ?>
                              </div>

                              <div class="mb-3 col-md-3">
                                 <label class="form-label">Meta Description</label>
                                 <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="<?php echo e(old('meta_desc')); ?>">
                                 <?php if($errors->has('meta_desc')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('meta_desc')); ?></p>
                                <?php endif; ?>
                              </div>

                              <div class="mb-3 col-md-3">
                                 <label class="form-label">Status</label>
                                 <select class="status  form-control wide" name="status" required>
                                   <option value="">Choose Status</option>
                                   <option value="active" <?php if(old('status') == "active" || old('status') == ""): ?> selected <?php endif; ?>>Active</option>
                                   <option value="inactive" <?php if(old('status') == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                                 </select>
                                 <?php if($errors->has('status')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('status')); ?></p>
                                 <?php endif; ?>
                              </div>

                           </div>
                                                 
                           
                           <div class="row">
                              <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="<?php echo e(route('admin_product_show')); ?>" class="btn btn-danger">Back</a>
                              
                              </div>
                           </div>
                        </div>
                        <div class="mb-6 col-md-3" style="overflow-y: scroll; height:1200px;">

                           <div class="row">   
                              <div class="mb-12 col-md-12"><div id="ajax_segment_bodypart_add_loader"></div></div>
                           </div>

                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Vehicle Types</label>
                                 <select class="category_id  form-control wide show_category_subc" name="category_id" id="category_id"  onchange="return change_segment_bodypart(this.value)"  >
                                     <option value="" <?php if(old('category_id') == ""): ?> selected <?php endif; ?>>Select Vehicle Type</option>
                                       <?php if($categories): ?>
                                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php $dash=''; ?>
                                             <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                 </select>
                                 <?php if($errors->has('parent_id')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('parent_id')); ?></p>
                                <?php endif; ?>
                              </div>
                           </div>

                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 
                                 <div id="parent_segment">

                                    <?php
                                       $cat_parents = array();
                                       if(old('category_id') !== 'null' and old('category_id') != ''){
                                          echo '<label class="form-label">Segments</label>';
                                          if(is_array(old('brand_id'))){
                                             $cat_parents = App\Http\Controllers\Admin\ProductController::getBrandsParents(old('brand_id'));
                                          }
                                          
                                       }

                                    ?>
                                    <?php if($brands &&  old('category_id') !== 'null' and old('category_id') != ''): ?>
                                       <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <ul id="myUL">
                                             <li>
                                                <?php if(count($brand->subBrandProduct)): ?>
                                                   <div class="caret open  <?php if(in_array($brand->id,$cat_parents) or in_array(old('brand_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                                <?php else: ?>
                                                   <div class="uncaret open">
                                                <?php endif; ?>
                                                <input type="checkbox" id="html" class="radio-btn" name="brand_id[]" value="<?php echo e($brand->id); ?>" <?php if(in_array($brand->id,getBrandFormAddValue())): ?> checked <?php endif; ?> >&nbsp;<?php echo e($brand->name); ?></div>
                                                
                                                   <?php if(count($brand->subBrandProduct)): ?>
                                                   <ul class="nested  <?php if(in_array($brand->id,$cat_parents)): ?>   active <?php endif; ?>">
                                                      <?php echo $__env->make('admin.product.subBrand_addform',['subbrands' => $brand->subBrandProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 
                                 <div id="parent_bodypart">
                                    
                                    <?php
                                       $cat_parents = array();
                                       if(old('category_id') !== 'null' and old('category_id') != ''){
                                          echo '<label class="form-label">Body Parts</label>';
                                          $cat_parents = App\Http\Controllers\Admin\ProductController::getBodypartPrents(old('bodypart_id'));
                                          
                                       }
                                    ?>
                                    <?php if($bodyparts &&  old('category_id') !== 'null' and old('category_id') != ''): ?>
                                       <?php $__currentLoopData = $bodyparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodypart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <ul id="myUL">
                                             <li>
                                                <?php if(count($bodypart->subBodypartProduct)): ?>
                                                   <div class="caret open  <?php if(in_array($bodypart->id,$cat_parents) or in_array(old('bodypart_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                                <?php else: ?>
                                                   <div class="uncaret open">
                                                <?php endif; ?>
                                                <input type="checkbox" id="html" class="radio-btn" name="bodypart_id" value="<?php echo e($bodypart->id); ?>" <?php if(old('bodypart_id') == $bodypart->id): ?> checked <?php endif; ?> >&nbsp;<?php echo e($bodypart->name); ?></div>
                                                
                                                   <?php if(count($bodypart->subBodypartProduct)): ?>
                                                   <ul class="nested  <?php if(in_array($bodypart->id,$cat_parents)): ?>   active <?php endif; ?>">
                                                       <?php echo $__env->make('admin.product.subBodyPart_addform',['subbodyparts' => $bodypart->subBodypartProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
               </div>
            </form>   
         </div>
      </div>
   </div>
  </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>

<script src="<?php echo e(asset('admin_assets/ckeditor/ckeditor.js')); ?>"></script>

<script type="text/javascript">

   function change_segment_bodypart(category){

      //alert(category);
      $.ajax({
           type: 'GET',
           url:  '/admin/change_dropdown_segment_bodypart',
           dataType: 'json',
           data:{'category':category,_token: '<?php echo e(csrf_token()); ?>'},
           beforeSend: function(){
               $('#ajax_segment_bodypart_add_loader').show();
           },
           complete: function(){
               $('#ajax_segment_bodypart_add_loader').hide();
           },
           success: function (data) {
              //console.log(data);
              $('#parent_segment').html(data.dropdown_segment);
              $('#parent_bodypart').html(data.dropdown_bodypart);
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


   function form_check(product){

         var regular_price ='';
         var sale_price = '';
         var brands = [];
         var bodyparts = [];

         $.each($("input[name='brand_id[]']:checked"), function(){   
             brands.push($(this).val());
         });
         $.each($("input[name='bodypart_id']:checked"), function(){   
             bodyparts.push($(this).val());
         });

         if(product.regular_price.value == ''){
            regular_price = parseFloat('0.00');
         } else {
            regular_price = parseFloat(product.regular_price.value);
         }
         if(product.sale_price.value == ''){
            sale_price = parseFloat('0.00');
         } else {
            sale_price = parseFloat(product.sale_price.value);
         }
         if(product.category_id.value == ''){

            alert("Please select Vehicle Types.");
            product.category_id.focus();
            return false;

         } else if(brands == '' && bodyparts == ''){
            product.category_id.focus();
            alert("Please select at least one between segments and body parts.");
            return false;
         } 
         /*
         else if(sale_price == '0.00') {
            alert("Please enter the value of sale price.");
            product.sale_price.focus(); 
            return false

         }
         */
         else if(regular_price < sale_price){
            if(regular_price == '0.00'){
               product.regular_price.value = sale_price;
            } else{
               alert("Regular price should be greater than sale price.");
               product.category_id.focus(); 
               return false
            }
         } else {
           return true;
         }
         

      }
    $(document).ready(function () {

      $(".category_id").select2();

      $(".status").select2();

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

      
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
         //console.log("Test");
          //$(this).parents('multiple_image_parent').remove();
          $(this).parents('.multiple_image_parent').remove();
      });

      CKEDITOR.replace('short_description', {
        filebrowserUploadUrl: "<?php echo e(route('product_ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
        extraAllowedContent: 'div(*)',
        allowedContent: true
      });

      CKEDITOR.replace('long_description', {
        filebrowserUploadUrl: "<?php echo e(route('product_ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
        extraAllowedContent: 'div(*)',
        allowedContent: true
      });


       //$('.ckeditor-textarea').ckeditor();




    });
    $(window).on('load', function (){
      //$( '.ckeditor-textarea' ).ckeditor();
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/product_add.blade.php ENDPATH**/ ?>