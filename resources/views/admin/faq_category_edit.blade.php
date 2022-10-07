
@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit FAQ Category</h4>
            </div>
         </div>
         
      </div>
      
      @if(Session::has('success') || Session::has('error'))

      <div class="row page-titles mx-0">
         <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
               
               @if (Session::has('success'))
                  <h4 class="mt-2 font-weight-bold success_msg_show" style="font-size:20px;">  
                  {!! Session::get('success') !!}
                  </h4>
               @endif

                  @if (Session::has('error'))
                     <h4 class="mt-2 font-weight-bold error_msg_show" style="font-size:20px;">
                     {!! Session::get('error') !!}
                     </h4>
                  @endif
               
            </div>
         </div>
         
      </div>

      @endif

      <div class="col-lg-12" id="faq_category_add_model" >
               <div class="card">
                  <form action="{{ route('admin_put_faq_category_show') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                       
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Name</label>
                           <input type="text" class="form-control" placeholder="Name" value="{{getFormEditValue($faq_category,'name')}}" name="name" id="name" required >
                           @if ($errors->has('name'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('name') }}</p>
                          @endif
                        </div>
                       
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Description</label>
                           <textarea type="text" class="form-control" placeholder="Descriptions" name="description" id="description">{{getFormEditValue($faq_category,'description')}}</textarea>
                           @if ($errors->has('description'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('description') }}</p>
                           @endif
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
                              @if($faq_category->image)
                                 <img src="{{Storage::url($faq_category->image)}}" class="rounded-lg me-2"  alt="" width="50" height="50" /> 
                              @endif
                           </div>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Image Attribute</label>
                           <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="{{getFormEditValue($faq_category,'image_attr')}}">
                           @if ($errors->has('image_attr'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('image_attr') }}</p>
                           @endif
                        </div>
                        
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Title</label>
                           <input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{getFormEditValue($faq_category,'meta_title')}}">
                           @if ($errors->has('meta_title'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('meta_title') }}</p>
                           @endif
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Keywords</label>
                           <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="{{getFormEditValue($faq_category,'meta_keyword')}}">
                           @if ($errors->has('meta_keyword'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('meta_keyword') }}</p>
                           @endif
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Meta Description</label>
                           <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="{{getFormEditValue($faq_category,'meta_desc')}}">
                           @if ($errors->has('meta_desc'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('meta_desc') }}</p>
                           @endif
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label" id="status">Status</label>
                           <select class="default-select  form-control wide" name="status" required >
                              <option value="" @if(getFormEditValue($faq_category,'status') == "") selected @endif>Choose Status</option>
                              <option value="active" @if(getFormEditValue($faq_category,'status') == "active") selected @endif>Active</option>
                              <option value="inactive" @if(getFormEditValue($faq_category,'status') == "inactive") selected @endif>Inactive</option>
                           </select>
                           @if ($errors->has('status'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                           @endif
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="{{url(route('admin_faq_category_show').get_edit_redirect_query_string())}}" class="btn btn-danger">Back</a>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                     </div>
                     <input type="hidden" name="faq_category_id" value="{{$faq_category->id}}">
                            </div>
                            </div>
                         </div>
                  </form>   
               </div>
            </div>
         </div>
      </div>
      
   </div>
  </div>


@endsection


