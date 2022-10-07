<div class="modal fade" id="viewProductModal<?php echo e($product->id); ?>">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Product Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Category</label>
                        <div style="font-weight:bold;">
                           <?php
                           if($product->category){
                              $category = $product->category;
                              echo $category->name;
                           }
                           ?>
                        </div>
                     </div>
                  
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Segment</label>
                        <div style="font-weight:bold;">
                           <?php
                           $brands = $product->brandCat()->orderBy('name')->get();

                           foreach($brands as $brand){
                              echo '<div>'.$brand->name.'</div>';
                           }
                           
                           ?>
                        </div>
                     </div>

                     <div class="mb-3 col-md-6">
                        <label class="form-label">Body Part</label>
                        <div style="font-weight:bold;">
                           <?php
                           if($product->bodypart){
                              $bodypart = $product->bodypart;
                              echo $bodypart->name;
                           }
                           ?>
                        </div>
                     </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;"><?php echo e($product->name); ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Part No.</label>
                     <div style="font-weight:bold;"><?php echo e($product->part_no); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Featured Product</label>
                     <div style="font-weight:bold;">
                        <?php if($product->featured): ?>
                           Yes
                        <?php else: ?> 
                           No
                        <?php endif; ?>
                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Views</label>
                     <div style="font-weight:bold;"><?php echo e($product->views); ?></div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Regular Price</label>
                     <div style="font-weight:bold;"><?php echo e(number_format($product->regular_price,2)); ?></div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Sale Price</label>
                     <div style="font-weight:bold;"><?php echo e(number_format($product->sale_price,2)); ?></div>
                     
                  </div>
                  <!--
                   <div class="mb-3 col-md-6">
                     <label class="form-label">Quantity</label>
                     <div style="font-weight:bold;"><?php echo e($product->quantity); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Compatible</label>
                     <div style="font-weight:bold;"><?php echo e($product->compatible); ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Colour</label>
                     <div style="font-weight:bold;"><?php echo e($product->colour); ?></div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Weight</label>
                     <div style="font-weight:bold;"><?php echo e($product->weight); ?></div>
                     
                  </div>

                  -->

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Brand</label>
                     <div style="font-weight:bold;"><?php echo e($product->brand); ?></div>
                     
                  </div>


                   <div class="mb-3 col-md-6">
                     <label class="form-label">Package Includes</label>
                     <div style="font-weight:bold;"><?php echo e($product->package_include); ?></div>
                     
                  </div>


                   <div class="mb-3 col-md-6">
                     <label class="form-label">Images</label><br>
                     <?php
                        $images = json_decode($product->images,true);
                        if(is_array($images)){
                           foreach($images as $image){
                              if(Storage::exists($image)){
                     ?>
                                <img src="<?php echo e(Storage::url($image)); ?>" class="rounded-lg me-2"  alt="" width="50" height="50" />&nbsp;&nbsp;
                     <?php
                              }
                           }
                        }
                    ?>
                    
                     
                  </div>

                  

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Short Description</label>
                     <div style="font-weight:bold;"><?php echo $product->short_description; ?></div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Long Description</label>
                     <div style="font-weight:bold;"><?php echo $product->long_description; ?></div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div style="font-weight:bold;"><?php echo e($product->image_attr); ?></div>
                     
                  </div>
                  
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div style="font-weight:bold;"><?php echo e($product->meta_title); ?></div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div style="font-weight:bold;"><?php echo e($product->meta_keyword); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div style="font-weight:bold;"><?php echo e($product->meta_desc); ?></div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;"><?php echo e($product->status); ?></div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/model/view_product.blade.php ENDPATH**/ ?>