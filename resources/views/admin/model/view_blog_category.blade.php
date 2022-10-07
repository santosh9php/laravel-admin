<div class="modal fade" id="viewBlogCategoryModal{{$blog_category->id}}">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Blog Category Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div style="font-weight:bold;">{{$blog_category->name}}</div>
                     
                  </div>
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Description</label>
                     <div style="font-weight:bold;">{!!$blog_category->description!!}</div>
                     
                  </div>
                  @if($blog_category->image)
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Image</label>
                        <div><img src="{{Storage::url($blog_category->image)}}" class="rounded-lg me-2"  alt="" width="50" height="50" /></div>
                        
                     </div>
                  @endif
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Image Attribute</label>
                     <div style="font-weight:bold;">{{$blog_category->image_attr}}</div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div style="font-weight:bold;">{{$blog_category->meta_title}}</div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div style="font-weight:bold;">{{$blog_category->meta_keyword}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div style="font-weight:bold;">{{$blog_category->meta_desc}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div style="font-weight:bold;">{{$blog_category->status}}</div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
