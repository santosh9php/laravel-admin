<div class="modal fade" id="viewPageModal{{$page->id}}">
   <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Page Details </h4>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>

         <div class="modal-body">

               <div class="row">
                 

                  <div class="mb-3 col-md-6">
                     <label class="form-label">Name</label>
                     <div>{{$page->name}}</div>
                     
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Slug</label>
                     <div>{{$page->slug}}</div>
                     
                  </div>
                 <div class="mb-3 col-md-12">
                     <label class="form-label">Content</label>
                     <div>{!!$page->content!!}</div>
                     
                  </div>
                  
                  
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Title</label>
                     <div>{{$page->meta_title}}</div>
                  </div>
                
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Keywords</label>
                    <div>{{$page->meta_keyword}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label">Meta Description</label>
                     <div>{{$page->meta_desc}}</div>
                  </div>
                  <div class="mb-3 col-md-6">
                     <label class="form-label" id="status">Status</label>
                     <div>{{$page->status}}</div>
                  </div>
               </div>
         </div>
         
   </div>
</div>
