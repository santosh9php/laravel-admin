@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;">Add Category</h4>
            </div>
         </div>
         
      </div>
      
      @if(Session::has('success') || Session::has('error'))

      <div class="row page-titles mb-0">
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

      <div class="col-lg-12" id="category_add_model" >
         <div class="card">
            <form action="{{ route('admin_post_category_show') }}" method="post" enctype="multipart/form-data">
            @csrf
               <div class="card-body">
                  <div class="basic-form">
                     <div class="row"> 
                        <div class="mb-6 col-md-9">
                           <div class="row">
                             

                               <div class="col-md-12">

                                        <div class="row">
                   
                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Name</label>
                                             <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name" required>
                                             @if ($errors->has('name'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('name') }}</p>
                                            @endif
                                          </div>
                              
                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Description</label>
                                             <textarea type="text" class="form-control" placeholder="Descriptions" name="description">{{old('description')}}</textarea>
                                             @if ($errors->has('description'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('description') }}</p>
                                            @endif
                                          </div>

                                          <div class="mb-3 col-md-6">
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
                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Image Attribute</label>
                                             <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="{{old('image_attr')}}">
                                             @if ($errors->has('image_attr'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('image_attr') }}</p>
                                            @endif
                                          </div>
                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Meta Title</label>
                                             <input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{old('meta_title')}}">
                                             @if ($errors->has('meta_title'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('meta_title') }}</p>
                                            @endif
                                          </div>
                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Meta Keywords</label>
                                             <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="{{old('meta_keyword')}}">
                                             @if ($errors->has('meta_keyword'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('meta_keyword') }}</p>
                                            @endif
                                          </div>

                                          <div class="mb-3 col-md-6">
                                             <label class="form-label">Meta Description</label>
                                             <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="{{old('meta_desc')}}">
                                             @if ($errors->has('meta_desc'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('meta_desc') }}</p>
                                            @endif
                                          </div>
                                       <?php /* ?>   
                                          <div class="mb-6 col-md-6">
                                               <label class="form-label">Status</label>
                                               <select class="default-select  form-control wide" name="status" >
                                                  <option value="">Choose Status</option>
                                                  <option value="active" @if(old('status') == "active" || old('status') == "") selected @endif>Active</option>
                                                  <option value="inactive" @if(old('status') == "inactive") selected @endif>Inactive</option>
                                               </select>
                                               @if ($errors->has('status'))
                                                 <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                                               @endif
                                          </div>

                                          <?php */ ?>   

                                        </div>

                               </div>

                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                                 <a class="btn btn-danger" href="{{url(route('admin_category_show').get_edit_redirect_query_string())}}">Back</a>
                              </div>
                              
                           </div>
                        </div>
                        <div class="mb-6 col-md-3" style="overflow-y: scroll; height:700px;">
                           
                           <div class="row">
                              <div class="mb-4 col-md-12 outer_box">
                                 <label class="form-label">Parent Category</label>
                                 <div id="parent_category">
                                    @php
                                       $cat_parents = array();
                                       if(old('parent_id') !== 'null' and old('parent_id') != ''){

                                          $cat_parents = App\Http\Controllers\Admin\CategoryController::getAllPrents(old('parent_id'));
                                          
                                       }
                                    @endphp
                                    @if($categories)
                                        @foreach($categories as $category)
                                          <ul id="myUL">
                                             <li>
                                                @if(count($category->subCategory))
                                                   <div class="caret open  @if(in_array($category->id,$cat_parents) or in_array(old('parent_id'),$cat_parents)) caret-down @endif ">

                                                @else
                                                   <div class="uncaret open">
                                                @endif
                                                <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="{{$category->id}}" @if(old('parent_id') == $category->id) checked @endif >&nbsp;{{$category->name}}</div>
                                                
                                                   @if(count($category->subCategory))
                                                   <ul class="nested  @if(in_array($category->id,$cat_parents))   active @endif">
                                                     @include('admin.subCategory.subCategory_addform',['subcategories' => $category->subCategory,'cat_parents'=>$cat_parents])
                                                   </ul>
                                                   @endif
                                                
                                             </li>
                                          </ul>
                                       @endforeach
                                    @endif
                                 </div>
                                 @if ($errors->has('parent_id'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('parent_id') }}</p>
                                @endif
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
      

@endsection


@section('page-js-script')

   <script language="javascript">

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

   $(document).ready(function(){

      $('#parent_category input:checkbox').click(function() {
         $('#parent_category input:checkbox').not(this).prop('checked', false);
      });
   })


   </script>

@endsection