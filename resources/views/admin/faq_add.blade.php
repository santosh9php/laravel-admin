
@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add FAQ</h4>
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
                  <form action="{{ route('admin_post_faq_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
                  @csrf
                     <div class="card-body">
                        <div class="basic-form">

                         
                        
                        <div class="row">

                           

                           
                           <div class="mb-3 col-md-6">
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

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Question</label>
                              <input type="text" class="form-control" placeholder="Question" value="{{old('question')}}" name="question" required>
                              @if ($errors->has('question'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('question') }}</p>
                             @endif
                           </div>
                           
                           
                        </div>

                       

                         <div class="row">

                           <div class="mb-3 col-md-8">
                              <label class="form-label">Answer</label>
                              <textarea type="text" class="form-control ckeditor-textarea" placeholder="Answer" name="answer" height="200">{{old('answer')}}</textarea>
                              @if ($errors->has('answer'))
                               <p class="text-danger mpg_input_error">{{ $errors->first('answer') }}</p>
                              @endif
                           </div>

                           

                        

                           <div class="mb-3 col-md-4">


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
                                <div class="mb-3">

                                </div>
                                <div class="mb-3">

                                </div>

 


                           </div>
 

                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{route('admin_faq_show')}}" class="btn btn-danger">Back</a>
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
   function form_check(faq){
         
         if(faq.category_id.value == ''){
            alert("Please select a faq category");
            faq.category_id.focus();
            return false;
         } else {
           return true;
         }
         

   }
    $(document).ready(function () {

      $(".category_id").select2();

      $(".status").select2();

      var editor = CKEDITOR.replace('answer', {
        filebrowserUploadUrl: "{{route('faq_ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height:400,
        extraAllowedContent: 'div(*)',
        allowedContent: true

      });

      //$('.ckeditor-textarea').ckeditor();

    });
    
</script>
@endsection
