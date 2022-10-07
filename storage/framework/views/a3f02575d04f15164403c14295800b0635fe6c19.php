



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
                                 <label class="form-label">Size</label>
                                 <input type="text" class="form-control" placeholder="Size" value="<?php echo e(old('size')); ?>" name="size" >
                                 <?php if($errors->has('size')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('size')); ?></p>
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

                        

                              <!--

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Quantity" value="<?php echo e(old('quantity')); ?>" name="quantity" >
                                    <?php if($errors->has('quantity')): ?>
                                     <p class="text-danger mpg_input_error"><?php echo e($errors->first('quantity')); ?></p>
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
                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Selected Categories</label>
                                 <div id="selected_categories" style="font-weight: bold;">None
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Categories</label>
                                 <div id="parent_category">

                                    <?php
                                       $cat_parents = array();
                                       if(old('category_id') !== 'null' and old('category_id') != ''){
                                          if(is_array(old('category_id'))){
                                             $cat_parents = App\Http\Controllers\Admin\ProductController::getCategoryParents(old('category_id'));
                                          }
                                          
                                       }

                                    ?>
                                    <?php if($categories ): ?>
                                       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <ul id="myUL">
                                             <li>
                                                <?php if(count($category->subCategoryProduct)): ?>
                                                   <div class="caret open  <?php if(in_array($category->id,$cat_parents) or in_array(old('category_id'),$cat_parents)): ?> caret-down <?php endif; ?> ">

                                                <?php else: ?>
                                                   <div class="uncaret open">
                                                <?php endif; ?>
                                                <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="<?php echo e($category->id); ?>" onchange="category_click(this,'<?php echo e($category->name); ?>')" <?php if(in_array($category->id,getCategoryFormAddValue())): ?> checked <?php endif; ?> >&nbsp;<?php echo e($category->name); ?></div>
                                                
                                                   <?php if(count($category->subCategoryProduct)): ?>
                                                   <ul class="nested  <?php if(in_array($category->id,$cat_parents)): ?>   active <?php endif; ?>">
                                                      <?php echo $__env->make('admin.product.subCategory_addform',['subcategories' => $category->subCategoryProduct,'cat_parents'=>$cat_parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                   </ul>
                                                   <?php endif; ?>
                                                
                                             </li>
                                          </ul>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                 </div>
                                 <?php if($errors->has('category_id')): ?>
                                  <p class="text-danger mpg_input_error"><?php echo e($errors->first('category_id')); ?></p>
                                <?php endif; ?>
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
   var selected_categories = [];
   function category_click(obj,category){
      if($(obj).is(":checked")){
       selected_categories.push(category);
      }else{
         for( var i = 0; i < selected_categories.length; i++){ 
    
            if ( selected_categories[i] === category) { 
          
               selected_categories.splice(i, 1); 
            }
          
         }
      }
      $("#selected_categories").html(selected_categories.join('&nbsp;,&nbsp;'));
   }
  

   function form_check(product){

         var regular_price ='';
         var sale_price = '';
         var categories = [];
         $.each($("input[name='category_id[]']:checked"), function(){   
             categories.push($(this).val());
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


         if(categories == ''){
            window.scrollTo(0,0);
            //product.category_id.focus();
            alert("Please select at least one category.");
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
               product.regular_price.focus(); 
               window.scrollTo(0,0);
               return false
            }
         } else {
           return true;
         }
         

      }
    $(document).ready(function () {


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

      /*
      $('#parent_category input:checkbox').click(function() {
         $('#parent_category input:checkbox').not(this).prop('checked', false);
      });
      */
      
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bathroom_product\resources\views/admin/product_add.blade.php ENDPATH**/ ?>