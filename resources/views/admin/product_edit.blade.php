
@extends('admin.main')

@section('body-content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit product</h4>
            </div>
         </div>
         
      </div>
      

      <div class="col-lg-12" id="product_add_model" >
            <div class="card">
               <form action="{{ route('admin_put_product_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
               @csrf
               @method('PUT')
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
                                    <input type="text" class="form-control" placeholder="Name" value="{{getFormEditValue($product,'name')}}" name="name" id="name" required >
                                    @if ($errors->has('name'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('name') }}</p>
                                   @endif
                                 </div>
                             

                                 <div class="mb-3 col-md-4">
                                    <label class="form-label">Size</label>
                                    <input type="text" class="form-control" placeholder="Size" value="{{getFormEditValue($product,'size')}}" name="size" id="size" >
                                    @if ($errors->has('size'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('size') }}</p>
                                   @endif
                                 </div>


                                 <div class="mb-3 col-md-4">
                                    <label class="form-label">Regular Price</label>
                                    <input type="number" class="form-control" placeholder="Regular Price" value="{{getFormEditValue($product,'regular_price')}}" name="regular_price" step=".01" >
                                    @if ($errors->has('regular_price'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('regular_price') }}</p>
                                   @endif
                                 </div>

                                 <div class="mb-3 col-md-4">
                                    <label class="form-label">Sale Price</label>
                                    <input type="number" class="form-control" placeholder="Sale Price" value="{{getFormEditValue($product,'sale_price')}}" name="sale_price" id="sale_price" step=".01" >
                                    @if ($errors->has('sale_price'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('sale_price') }}</p>
                                   @endif
                                 </div>

                                 
                                 
                                 <!--
                                 
                                  <div class="mb-3 col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Quantity" value="{{getFormEditValue($product,'quantity')}}" name="quantity" id="quantity" >
                                    @if ($errors->has('quantity'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('quantity') }}</p>
                                   @endif
                                 </div>

                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Colour</label>
                                    <input type="text" class="form-control" placeholder="Colour" value="{{getFormEditValue($product,'colour')}}" name="colour" id="colour" >
                                    @if ($errors->has('colour'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('colour') }}</p>
                                   @endif
                                 </div>

                                  <div class="mb-3 col-md-3">
                                    <label class="form-label">Weight</label>
                                    <input type="text" class="form-control" placeholder="Weight" value="{{getFormEditValue($product,'weight')}}" name="weight" id="weight" >
                                    @if ($errors->has('weight'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('weight') }}</p>
                                   @endif
                                 </div>

                                 -->

                                

                                 <div class="mb-3 col-md-4">
                                    <label class="form-label">Image Attribute</label>
                                    <input type="text" class="form-control" placeholder="Alt." name="image_attr" value="{{getFormEditValue($product,'image_attr')}}">
                                    @if ($errors->has('image_attr'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('image_attr') }}</p>
                                    @endif
                                 </div>

                                 <div class="mb-3 col-md-4">
                                    <div class="form-group">
                                           <label class="mb-1">Featured product:</label> <br />
                                          <label class="radio-inline mr-3">
                                              <input type="radio" name="featured" value="1" @if(getFormEditValue($product,'featured') == 1) checked @endif>  Yes  </label>&nbsp;&nbsp;
                                          <label class="radio-inline mr-3">
                                              <input type="radio" name="featured" value="0" @if(getFormEditValue($product,'featured') == 0) checked @endif> No</label> 
                                          @if ($errors->has('featured'))
                                              <p class="text-danger mpg_input_error">{{ $errors->first('featured') }}</p>
                                          @endif

                                    </div>
                                 </div>

                              </div>

                              <div class="row increment multiple_image_upload">

                                 <div class="mb-3 col-md-6">
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

                                 <div class="mb-3 col-md-6">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="input-group-btn"> 
                                       <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                 </div>

                              </div>

                              <div class="row clone multiple_image_hide">
                                 <div class="row multiple_image_parent">
                                    <div class="mb-3 col-md-6">

                                       <div class="basic-form custom_file_input">
                                          <div class="input-group">
                                             <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                                <input type="file" class="form-file-input form-control" name="images[]" >
                                             </div>
                                             <span class="input-group-text">Upload</span>
                                          </div>
                                       </div>
                                    
                                    </div>
                                    <div class="mb-3 col-md-6"> 
                                       <div class="input-group-btn"> 
                                         <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                       </div>
                                    </div>  
                                 </div> 

                              </div>


                              <div class="row">
                              
                                 <div class="mb-3 col-md-6">
                                    
                                    @php
                                       $images = json_decode($product->images,true);
                                       if(is_array($images) && count($images)){
                                    @endphp
                                       
                                       <table width="100%" style="border-collapse: separate;   border-spacing: 0 1em;"  >
                                          <tr>
                                             <td>Images</td><td>Action</td>
                                          </tr>
                                    @php
                                          foreach($images as $image){
                                             if(Storage::exists($image)){
                                                $image_name = basename($image);
                                                $img_arr = explode(".",$image_name);
                                                //print_r($img_arr);
                                       @endphp
                                             <tr style="margin-top: 10px;" id="{{$img_arr[0]}}">
                                                <td>
                                                   <img src="{{Storage::url($image)}}" class="rounded-lg me-2"  alt="" width="50" height="50" />&nbsp;&nbsp;
                                                </td>
                                                <td><button class="btn btn-primary image_delete" data-id="{{ $product->id }}" data-image="{{ $image }}" data-row="{{$img_arr[0]}}">Delete</button></td>
                                             </tr>
                                       @php
                                             }
                                          }
                                    @endphp
                                       </table>
                                    @php
                                       }
                                   @endphp
                                    
                                 </div>

                                 <div class="mb-3 col-md-6">
                                    &nbsp;
                                 </div>

                              </div>

                              <div class="row">
                                 <div class="mb-3 col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea type="text" class="form-control ckeditor-textarea" placeholder="Short Description" name="short_description" id="short_description">{{getFormEditValue($product,'short_description')}}</textarea>
                                    @if ($errors->has('short_description'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('short_description') }}</p>
                                    @endif
                                 </div>
                              </div>

                              <div class="row">

                                 <div class="mb-3 col-md-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea type="text" class="form-control ckeditor-textarea" placeholder="Long Descriptions" name="long_description">{{getFormEditValue($product,'long_description')}}</textarea>
                                    @if ($errors->has('long_description'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('long_description') }}</p>
                                    @endif
                                 </div>
                              </div>
                              
                              
                              <div class="row">
                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{getFormEditValue($product,'meta_title')}}">
                                    @if ($errors->has('meta_title'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('meta_title') }}</p>
                                    @endif
                                 </div>
                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" placeholder="Keywords" name="meta_keyword" value="{{getFormEditValue($product,'meta_keyword')}}">
                                    @if ($errors->has('meta_keyword'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('meta_keyword') }}</p>
                                    @endif
                                 </div>
                                 <div class="mb-3 col-md-3">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" placeholder="Descriptions" name="meta_desc" value="{{getFormEditValue($product,'meta_desc')}}">
                                    @if ($errors->has('meta_desc'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('meta_desc') }}</p>
                                    @endif
                                 </div>
                                 <div class="mb-3 col-md-3">
                                    <label class="form-label" id="status">Status</label>
                                    <select class="status  form-control wide" name="status" required >
                                       <option value="" @if(getFormEditValue($product,'status') == "") selected @endif>Choose Status</option>
                                       <option value="active" @if(getFormEditValue($product,'status') == "active") selected @endif>Active</option>
                                       <option value="inactive" @if(getFormEditValue($product,'status') == "inactive") selected @endif>Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                                    @endif
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{url(route('admin_product_show').get_edit_redirect_query_string())}}" class="btn btn-danger">Back</a>
                                 </div>
                                 <div class="col-md-6">
                                   
                                 </div>
                           </div>
                        </div>
                           <div class="mb-6 col-md-3" style="overflow-y: scroll; height:1400px;">

                              <div class="row">
                                 <div class="mb-3 col-md-12">
                                    <label class="form-label">Selected Categories</label>
                                    <div id="selected_categories" style="font-weight: bold;">
                                       @php $count =0; @endphp
                                       @php
                                          echo "<script type=\"text/javascript\">
                                                   var selected_categories = [];
                                                </script>";
                                       @endphp
                                       @if($selected_categories)
                                          @foreach($selected_categories as $selected_category)

                                             @php if($count !=0) echo '&nbsp;,&nbsp;'; else $count =1; @endphp
                                             {{$selected_category->name}}

                                             @php

                                                echo "<script type=\"text/javascript\">
                                                         //console.log(\"$selected_category->name\");
                                                         selected_categories.push(\"$selected_category->name\");
                                                      </script>";

                                             @endphp

                                          @endforeach
                                       @endif
                                       @php if($count ==0) echo 'None'; @endphp
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row">
                                 <div class="mb-3 col-md-12">
                                    <div id="parent_segment">
                                       <label class="form-label">Categories</label>
                                       @php
                                          $cat_parents = array();
                                          $cat_parents = App\Http\Controllers\Admin\ProductController::getCategoryParents(getCategoryFormEditValue($product,$product->id));
                                       @endphp

                                       @if($categories)
                                          @foreach($categories as $category)
                                             <ul id="myUL">
                                                <li>
                                                   @if(count($category->subCategoryProduct))
                                                      <div class="caret open  @if(in_array($category->id,$cat_parents) or in_array(old('category_id'),$cat_parents)) caret-down @endif ">

                                                   @else
                                                      <div class="uncaret open">
                                                   @endif
                                                   <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="{{$category->id}}" onchange="category_click(this,'{{$category->name}}')" @if(in_array($category->id,getCategoryFormEditValue($product,$product->id))) checked @endif >&nbsp;{{$category->name}}</div>
                                                   
                                                      @if(count($category->subCategoryProduct))
                                                      <ul class="nested  @if(in_array($category->id,$cat_parents))   active @endif">

                                                         @include('admin.product.subCategory_editform',['subcategories' => $category->subCategoryProduct,'cat_parents'=>$cat_parents])

                                                      </ul>
                                                      @endif
                                                </li>
                                             </ul>
                                          @endforeach
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="product_id" value="{{$product->id}}">
               </form>   
            </div>
      </div>
   </div>
</div>

<!-- Image Delete Modal -->

<div class="modal" id="image_delete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Image Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="image_delete_msg">Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- End of image delete -->

@endsection


@section('page-js-script')

<script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">

  
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
            return false;

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

      $(".category_id").select2();

      $(".status").select2();

      $(".image_delete").click(function(e){

         e.preventDefault();

         if(!confirm("Do you want to delete this image.?")) {
          return false;
         }

         var id = $(this).data("id");
         var image = $(this).data("image");
         var row_id=$(this).data("row");
         /*
            $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
        */

         $.ajax({
            type: 'DELETE',
            url:  '/admin/product/image_delete',
            dataType: 'json',
            data:{'id':id,'image':image, _token: '{{csrf_token()}}'},
            success: function (data) {
               console.log(row_id);
               console.log(data);

               if($('#image_delete_msg').hasClass('image_delete_error')){
                  $('#image_delete_msg').removeClass('image_delete_error');
               }
               if(!$('#image_delete_msg').hasClass('image_delete_success')){
                  $('#image_delete_msg').addClass('image_delete_success');
               }
               
               $('#image_delete_msg').text(data.message);
               $('#image_delete').modal('show');
               $("#"+row_id).remove();

            },
            error: function (data, textStatus, errorThrown) {
                 console.log(data);
               if(!$('#image_delete_msg').hasClass('image_delete_error')){
                  $('#image_delete_msg').addClass('image_delete_error');
               }
               if($('#image_delete_msg').hasClass('image_delete_success')){
                  $('#image_delete_msg').removeClass('image_delete_success');
               }
               $('#image_delete_msg').text(data.message);
               $('#image_delete').modal('show');
            },
         });


      });


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


      // $('.ckeditor-textarea').ckeditor();

    });
    $(window).on('load', function (){
      //$( '.ckeditor-textarea' ).ckeditor();
   });
</script>
@endsection
