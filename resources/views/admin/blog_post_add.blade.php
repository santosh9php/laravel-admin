
@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles  mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add Blog Post</h4>
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

      <div class="col-lg-12" id="bodypart_add_model" >
               <div class="card">
                  <form action="{{ route('admin_post_blog_post_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  @csrf
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                           
                           <div class="mb-3 col-md-4">
                              <label class="form-label">Category</label>
                              <select class="category_id  form-control wide show_category_subc" name="category_id" required>
                                  <option value="" @if(old('category_id') == "") selected @endif>Select Category</option>
                                    @if($categories)
                                       @foreach($categories as $category)
                                          <?php $dash=''; ?>
                                          <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
                                         
                                       @endforeach
                                    @endif
                              </select>
                              @if ($errors->has('parent_id'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('parent_id') }}</p>
                             @endif
                           </div>

                           <div class="mb-3 col-md-4">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" placeholder="Title" value="{{old('title')}}" name="title" required>
                              @if ($errors->has('title'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('title') }}</p>
                             @endif
                           </div>
                           
                           <div class="mb-3 col-md-4">
                              <div class="basic-form custom_file_input">
                                 <label class="form-label">Image</label>
                                 <div class="input-group">
                                    <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                       <input type="file" class="form-file-input form-control" name="image" >
                                       @if ($errors->has('image'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('image') }}</p>
                                      @endif
                                    </div>
                                    <span class="input-group-text">Upload</span>
                                 </div>
                              </div>
                           </div>
                        
                        </div>

                         <div class="row">

                           <div class="mb-3 col-md-8">
                              <label class="form-label">Content</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Descriptions" name="content" height="200">{{old('content')}}</textarea>
                              @if ($errors->has('content'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('content') }}</p>
                              @endif
                           </div>

                            
                           <div class="mb-3 col-md-4">

                               <div class="mb-3">
                                      <label class="form-label">Image Attribute</label>
                                      <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="{{old('image_attr')}}">
                                      @if ($errors->has('image_attr'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('image_attr') }}</p>
                                     @endif
                               </div>
                               <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{old('meta_title')}}">
                                        @if ($errors->has('meta_title'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('meta_title') }}</p>
                                        @endif
                               </div>
                               <div class="mb-3">
                                          <label class="form-label">Meta Keywords</label>
                                          <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="{{old('meta_keyword')}}">
                                          @if ($errors->has('meta_keyword'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('meta_keyword') }}</p>
                                         @endif
                               </div>
                               <div class="mb-3">
                                          <label class="form-label">Meta Description</label>
                                          <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="{{old('meta_desc')}}">
                                          @if ($errors->has('meta_desc'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('meta_desc') }}</p>
                                         @endif
                               </div>
                               <div class="mb-3">
                                          <label class="form-label">Status</label>
                                          <select class="status  form-control wide" name="status" required>
                                            <option value="">Choose Status</option>
                                            <option value="active" @if(old('status') == "active" || old('status') == "") selected @endif>Active</option>
                                            <option value="inactive" @if(old('status') == "inactive") selected @endif>Inactive</option>
                                          </select>
                                          @if ($errors->has('status'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                                          @endif
                               </div>
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>
                               <div class="mb-3"></div>



                           </div>
                            
 
                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button> &nbsp;<a href="{{route('admin_blog_post_show')}}" class="btn btn-danger">Back</a>
                           </div>
                           <div class="col-md-6">
                             
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
@section('page-js-script')

<script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
   function form_check(post){
         
         if(post.category_id.value == ''){
            alert("Please select a blog category");
            post.category_id.focus();
            return false;
         } else {
           return true;
         }
         

   }
    $(document).ready(function () {


      $(".category_id").select2();


      $(".status").select2();

      var editor = CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('blog_post_ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height:400,
        extraAllowedContent: 'div(*)',
        allowedContent: true

      });

       //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
@endsection
