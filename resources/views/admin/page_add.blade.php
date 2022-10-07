
@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;">Add page</h4>
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
                  <form action="{{ route('admin_post_page_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  @csrf
                     <div class="card-body">
                        <div class="basic-form">
                        
                        <div class="row">
                           

                           <div class="mb-3 col-md-12">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name" required>
                              @if ($errors->has('name'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('name') }}</p>
                             @endif
                           </div>

                           

                           
                        
                        </div>

                         <div class="row">

                           <div class="mb-3 col-md-12">
                              <label class="form-label">Content</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Descriptions" name="content" height="200">{{old('content')}}</textarea>
                              @if ($errors->has('content'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('content') }}</p>
                              @endif
                           </div>

                           

                        </div>
                         <div class="row">

                           <div class="mb-3 col-md-3">
                              <label class="form-label">Meta Title</label>
                              <input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{old('meta_title')}}">
                              @if ($errors->has('meta_title'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('meta_title') }}</p>
                             @endif
                           </div>

                           <div class="mb-3 col-md-3">
                              <label class="form-label">Meta Keywords</label>
                              <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="{{old('meta_keyword')}}">
                              @if ($errors->has('meta_keyword'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('meta_keyword') }}</p>
                             @endif
                           </div>

                           <div class="mb-3 col-md-3">
                              <label class="form-label">Meta Description</label>
                              <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="{{old('meta_desc')}}">
                              @if ($errors->has('meta_desc'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('meta_desc') }}</p>
                             @endif
                           </div>

                           <div class="mb-3 col-md-3">
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

                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{route('admin_page_show')}}" class="btn btn-danger">Back</a>
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
    $(document).ready(function () {

      $(".status").select2();

      var editor = CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('page_ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height:400,
        extraAllowedContent: 'div(*)',
        allowedContent: true

      });

        CKEDITOR.dtd.$removeEmpty['i'] = false;

      //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
@endsection
