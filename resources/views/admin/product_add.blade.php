
@extends('admin.main')


@section('body-content')

  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add Product</h4>
            </div>
         </div>
         
      </div>
      
      

      <div class="col-lg-12" id="bodypart_add_model" >
         <div class="card">
            <form action="{{ route('admin_post_product_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
            @csrf
               <div class="card-body">
                  <div class="basic-form">

                     @if(Session::has('success') || Session::has('error'))

                        <div class="row ">
                           <div class="col-sm-12">
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


                     <div class="row"> 
                        <div class="mb-6 col-md-9">

                           
                           <div class="row">

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Name</label>
                                 <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name" required >
                                 @if ($errors->has('name'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('name') }}</p>
                                @endif
                              </div>

                              

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Size</label>
                                 <input type="text" class="form-control" placeholder="Size" value="{{old('size')}}" name="size" >
                                 @if ($errors->has('size'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('size') }}</p>
                                @endif
                              </div>


                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Regular Price</label>
                                 <input type="number" class="form-control" placeholder="Regular Price" value="{{old('regular_price')}}" name="regular_price" step=".01" >
                                 @if ($errors->has('regular_price'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('regular_price') }}</p>
                                @endif
                              </div>

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Sale Price</label>
                                 <input type="number" class="form-control" placeholder="Sale Price" value="{{old('sale_price')}}" name="sale_price" step=".01" >
                                 @if ($errors->has('sale_price'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('sale_price') }}</p>
                                @endif
                              </div>

                        

                              <!--

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Quantity" value="{{old('quantity')}}" name="quantity" >
                                    @if ($errors->has('quantity'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('quantity') }}</p>
                                   @endif
                                 </div>
                                

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Colour</label>
                                    <input type="text" class="form-control" placeholder="Colour" value="{{old('colour')}}" name="colour" >
                                    @if ($errors->has('colour'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('colour') }}</p>
                                   @endif
                                 </div>

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Weight</label>
                                    <input type="text" class="form-control" placeholder="Weight" value="{{old('weight')}}" name="weight" >
                                    @if ($errors->has('weight'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('weight') }}</p>
                                   @endif
                                 </div>

                              -->

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">Image Attribute</label>
                                 <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="{{old('image_attr')}}">
                                 @if ($errors->has('image_attr'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('image_attr') }}</p>
                                @endif
                                 
                              </div>

                              <div class="mb-3 col-md-4">
                                 <div class="form-group">
                                        <label class="mb-1">Featured product:</label><br />
                                       <label class="radio-inline mr-3">
                                           <input type="radio" name="featured" value="1" @if(old('featured') == 1) checked @endif>  Yes  </label>&nbsp;&nbsp;
                                       <label class="radio-inline mr-3">
                                           <input type="radio" name="featured" value="0" @if(old('featured') == 0 or old('featured') === null) checked @endif> No</label> 
                                       @if ($errors->has('featured'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('featured') }}</p>
                                       @endif

                                 </div>
                              </div>

                           </div>
                           <div class="row increment multiple_image_upload">

                              <div class="mb-3 col-md-8">
                                 <div class="basic-form custom_file_input">
                                    <label class="form-label">Image</label>
                                    <div class="input-group">
                                       <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                          <input type="file" class="form-file-input form-control" name="images[]" >
                                       </div>
                                       <span class="input-group-text">Upload</span>
                                    </div>
                                 </div>
                              </div>

                              <div class="mb-3 col-md-4">
                                 <label class="form-label">&nbsp;</label>
                                 <div class="input-group-btn"> 
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                 </div>
                              </div>

                           </div>

                           <div class="row clone multiple_image_hide">
                              <div class="row multiple_image_parent">
                                 <div class="mb-3 col-md-8">

                                    <div class="basic-form custom_file_input">
                                       <div class="input-group">
                                          <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                             <input type="file" class="form-file-input form-control" name="images[]" >
                                          </div>
                                          <span class="input-group-text">Upload</span>
                                       </div>
                                    </div>
                                 
                                 </div>
                                 <div class="mb-3 col-md-4"> 
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                 </div>  
                              </div> 

                           </div>

                           <div class="row">

                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Short Description</label>
                                 <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Descriptions" name="short_description">{{old('short_description')}}</textarea>
                                 @if ($errors->has('short_description'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('short_description') }}</p>
                                 @endif
                              </div>
                              
                           </div>
                           <div class="row">

                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Long Description</label>
                                 <textarea type="text" class="form-control ckeditor-textarea" placeholder="Long Descriptions" name="long_description">{{old('long_description')}}</textarea>
                                 @if ($errors->has('long_description'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('long_description') }}</p>
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
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{route('admin_product_show')}}" class="btn btn-danger">Back</a>
                              
                              </div>
                           </div>
                        </div>
                        <div class="mb-6 col-md-3" style="overflow-y: scroll; height:1200px;">
                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Selected Categories</label>
                                 <div id="selected_categories" style="font-weight: bold;">None
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="mb-3 col-md-12">
                                 <label class="form-label">Categories</label>
                                 <div id="parent_category">

                                    @php
                                       $cat_parents = array();
                                       if(old('category_id') !== 'null' and old('category_id') != ''){
                                          if(is_array(old('category_id'))){
                                             $cat_parents = App\Http\Controllers\Admin\ProductController::getCategoryParents(old('category_id'));
                                          }
                                          
                                       }

                                    @endphp
                                    @if($categories )
                                       @foreach($categories as $category)
                                          <ul id="myUL">
                                             <li>
                                                @if(count($category->subCategoryProduct))
                                                   <div class="caret open  @if(in_array($category->id,$cat_parents) or in_array(old('category_id'),$cat_parents)) caret-down @endif ">

                                                @else
                                                   <div class="uncaret open">
                                                @endif
                                                <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="{{$category->id}}" onchange="category_click(this,'{{$category->name}}')" @if(in_array($category->id,getCategoryFormAddValue())) checked @endif >&nbsp;{{$category->name}}</div>
                                                
                                                   @if(count($category->subCategoryProduct))
                                                   <ul class="nested  @if(in_array($category->id,$cat_parents))   active @endif">
                                                      @include('admin.product.subCategory_addform',['subcategories' => $category->subCategoryProduct,'cat_parents'=>$cat_parents])
                                                   </ul>
                                                   @endif
                                                
                                             </li>
                                          </ul>
                                       @endforeach
                                    @endif
                                    
                                 </div>
                                 @if ($errors->has('category_id'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('category_id') }}</p>
                                @endif
                              </div>
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

<script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
   var selected_categories = [];
   function category_click(obj,category){
      if($(obj).is(":checked")){
       selected_categories.push(category);
      }else{
         for( var i = 0; i < selected_categories.length; i++){ 
    
            if ( selected_categories[i] === category) { 
          
               selected_categories.splice(i, 1); 
            }
          
         }
      }
      $("#selected_categories").html(selected_categories.join('&nbsp;,&nbsp;'));
   }
  

   function form_check(product){

         var regular_price ='';
         var sale_price = '';
         var categories = [];
         $.each($("input[name='category_id[]']:checked"), function(){   
             categories.push($(this).val());
         });
         
         if(product.regular_price.value == ''){
            regular_price = parseFloat('0.00');
         } else {
            regular_price = parseFloat(product.regular_price.value);
         }
         if(product.sale_price.value == ''){
            sale_price = parseFloat('0.00');
         } else {
            sale_price = parseFloat(product.sale_price.value);
         }


         if(categories == ''){
            window.scrollTo(0,0);
            //product.category_id.focus();
            alert("Please select at least one category.");
            return false;
         } 
         /*
         else if(sale_price == '0.00') {
            alert("Please enter the value of sale price.");
            product.sale_price.focus(); 
            return false

         }
         */
         else if(regular_price < sale_price){
            if(regular_price == '0.00'){
               product.regular_price.value = sale_price;
            } else{
               alert("Regular price should be greater than sale price.");
               product.regular_price.focus(); 
               window.scrollTo(0,0);
               return false
            }
         } else {
           return true;
         }
         

      }
    $(document).ready(function () {


      $(".status").select2();

     
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

      /*
      $('#parent_category input:checkbox').click(function() {
         $('#parent_category input:checkbox').not(this).prop('checked', false);
      });
      */
      
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
         //console.log("Test");
          //$(this).parents('multiple_image_parent').remove();
          $(this).parents('.multiple_image_parent').remove();
      });

      CKEDITOR.replace('short_description', {
        filebrowserUploadUrl: "{{route('product_ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        extraAllowedContent: 'div(*)',
        allowedContent: true
      });

      CKEDITOR.replace('long_description', {
        filebrowserUploadUrl: "{{route('product_ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        extraAllowedContent: 'div(*)',
        allowedContent: true
      });


       //$('.ckeditor-textarea').ckeditor();




    });
    $(window).on('load', function (){
      //$( '.ckeditor-textarea' ).ckeditor();
   });
</script>
@endsection
