<div class="card mb-0 border-bottom" id="category_add_model" >
   <div class="card-header">
      <h4 class="card-title">Add Vehicle Types</h4>
      <!--   <div class="float-left"></div>
         <div class="float-right text-right">asdfsad</div>
         <div class="clearfix"></div> -->
   </div>

   <div class="card-body" >
      <form action="<?php echo e(route('admin_post_category_show')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
         <div class="basic-form">
         <div class="row">
            <?php /* ?>
            <div class="mb-3 col-md-3 outer_box">

               <label class="form-label">Parent Category</label>
               <?php
               $cat_parents = array();
               if(old('parent_id') !== 'null' and old('parent_id') != ''){

                  $cat_parents = App\Http\Controllers\Admin\CategoryController::getAllPrents(old('parent_id'));
                  
               }
               ?>
               @if($categories)
                  @foreach($categories as $category)
                     <ul id="myUL">
                        <li>
                           @if(count($category->subCategory))
                              <div class="caret open  @if(in_array($category->id,$cat_parents) or in_array(old('parent_id'),$cat_parents)) caret-down @endif ">

                           @else
                              <div class="open">
                           @endif
                           <input type="radio" id="html" class="radio-btn" name="parent_id" value="{{$category->id}}" @if(old('parent_id') == $category->id) checked @endif > {{$category->name}}</div>
                           
                              @if(count($category->subCategory))
                              <ul class="nested  @if(in_array($category->id,$cat_parents))   active @endif">
                                 @include('admin.subCategory.subCategory_addform',['subcategories' => $category->subCategory,'cat_parents'=>$cat_parents])
                              </ul>
                              @endif
                           
                        </li>
                     </ul>
                  @endforeach
               @endif



               
               @if ($errors->has('parent_id'))
                <p class="text-danger mpg_input_error">{{ $errors->first('parent_id') }}</p>
              @endif
            </div>

            <?php */ ?>

             <div class="col-md-12">

                      <div class="row">
 
                        <div class="mb-3 col-md-3">
                           <label class="form-label">Name</label>
                           <input type="text" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>" name="name" required>
                           <?php if($errors->has('name')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('name')); ?></p>
                          <?php endif; ?>
                        </div>
            
                        <div class="mb-3 col-md-3">
                           <label class="form-label">Description</label>
                           <textarea type="text" class="form-control" placeholder="Descriptions" name="description"><?php echo e(old('description')); ?></textarea>
                           <?php if($errors->has('description')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('description')); ?></p>
                          <?php endif; ?>
                        </div>

                        <div class="mb-3 col-md-3">
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
                        <div class="mb-3 col-md-3">
                           <label class="form-label">Image Attribute</label>
                           <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="<?php echo e(old('image_attr')); ?>">
                           <?php if($errors->has('image_attr')): ?>
                            <p class="text-danger mpg_input_error"><?php echo e($errors->first('image_attr')); ?></p>
                          <?php endif; ?>
                        </div>
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

                      </div>
                      <?php */ ?>


             </div>

            

          </div>

              

          <div class="row">
            <div class="col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>&nbsp;<button type="submit"  class="btn btn-danger link-primary" id="category_hide_form">Hide Form</button>
            </div>
            
         </div>

         </div>
      </form>
   </div>

</div>

<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/category_add.blade.php ENDPATH**/ ?>