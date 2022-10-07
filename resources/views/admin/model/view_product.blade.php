<div class="modal fade" id="viewProductModal{{$product->id}}">
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
                           @php
                           $categories = $product->productCat()->orderBy('name')->get();

                           foreach($categories as $category){
                              echo '<div>'.$category->name.'</div>';
                           }
                           
                           @endphp
                        </div>
                     </div>

                     

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;">{{$product->name}}</div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Size</label>
                     <div style="font-weight:bold;">{{$product->size}}</div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Featured Product</label>
                     <div style="font-weight:bold;">
                        @if($product->featured)
                           Yes
                        @else 
                           No
                        @endif
                     </div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Views</label>
                     <div style="font-weight:bold;">{{$product->views}}</div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Regular Price</label>
                     <div style="font-weight:bold;">{{number_format($product->regular_price,2)}}</div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Sale Price</label>
                     <div style="font-weight:bold;">{{number_format($product->sale_price,2)}}</div>
                     
                  </div>
                  <!--
                   <div class="mb-3 col-md-6">
                     <label class="form-label">Quantity</label>
                     <div style="font-weight:bold;">{{$product->quantity}}</div>
                     
                  </div>

                  

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Colour</label>
                     <div style="font-weight:bold;">{{$product->colour}}</div>
                     
                  </div>

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Weight</label>
                     <div style="font-weight:bold;">{{$product->weight}}</div>
                     
                  </div>

                  -->

                  

                   <div class="mb-3 col-md-6">
                     <label class="form-label">Images</label><br>
                     @php
                        $images = json_decode($product->images,true);
                        if(is_array($images)){
                           foreach($images as $image){
                              if(Storage::exists($image)){
                     @endphp
                                <img src="{{Storage::url($image)}}" class="rounded-lg me-2"  alt="" width="50" height="50" />&nbsp;&nbsp;
                     @php
                              }
                           }
                        }
                    @endphp
                    
                     
                  </div>

                  

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Short Description</label>
                     <div style="font-weight:bold;">{!!$product->short_description!!}</div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Long Description</label>
                     <div style="font-weight:bold;">{!!$product->long_description!!}</div>
                     
                  </div>

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div style="font-weight:bold;">{{$product->image_attr}}</div>
                     
                  </div>
                  
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div style="font-weight:bold;">{{$product->meta_title}}</div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div style="font-weight:bold;">{{$product->meta_keyword}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div style="font-weight:bold;">{{$product->meta_desc}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;">{{$product->status}}</div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
