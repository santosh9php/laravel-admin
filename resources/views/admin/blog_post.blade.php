@php
   if(Route::currentRouteName() == 'admin_blog_post_show'){
      edit_redirect_query_string('admin_blog_post_show');
   }
@endphp

@extends('admin.main')

@section('body-content')
  <div class="content-body">
      <div class="container-fluid">
         <!-- Add Project -->
         <div class="row page-titles  mb-0 border-bottom mx-0">
            <div class="col-sm-6 p-md-0">
               <div class="welcome-text">
                  <h4 class="mt-2 font-weight-bold">  Blog Posts Management</h4>
               </div>
            </div>

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

               @can('blog-post-add')
                  <a class="btn btn-success page_add_button" href="{{route('admin_blog_post_form_show')}}">Add Blog Post</a> 
               @endcan
            </div>
         </div>

         @if(Session::has('success') || Session::has('error'))
            <div class="row page-titles mb-0 border-bottom mx-0">
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
         
         @include('admin.blog_post_show')
      </div>
  </div>

   <!--For Model -->
   <!-- Delete blog_post -->
   @include('admin.model.delete_blog_post')
   <!-- End of delete blog_post -->

@endsection

@section('page-js-script')

  <script type="text/javascript">


     $(document).ready(function(){

         $("#bulk_delete").select2();

         $("#change_status").select2();

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='blog_post_ids']:checked"), function () {
               open.push($(this).val());
            });
             //alert("We remain open on: " + open.join(", "));
             //alert($("#change_status").val());
            if($("#bulk_delete").val() != ""){
               if(open.length < 1){
                  alert("Checked at least one record.")
                  $("#bulk_delete").val('');
                  document.getElementById("bulk_delete").selectedIndex = "0";
                  $("#bulk_delete").trigger("change.select2");
                  //$("select#change_status")[0].selectedIndex = 0;
                  //$('#change_status option:nth-child(1)').val();
               } else{
                  let status = confirm("Are you sure to delete the selected records?");
                  if(status){
                     $("#blog_post_bulk_delete_ids").val(open.join(", "));
                     $("#bulk_delete_form").submit();
                  } else {

                     $("#bulk_delete").val('');
                     $("#bulk_delete").trigger("change.select2");
                  }
               }
            } 
           
         });

         $("#change_status").change(function(){
            var open = [];
            $.each($("input:checkbox[name='blog_post_ids']:checked"), function () {
               open.push($(this).val());
            });
             //alert("We remain open on: " + open.join(", "));
             //alert($("#change_status").val());
            if($("#change_status").val() != ""){
               if(open.length < 1){
                  alert("Checked at least one record.")
                  $("#change_status").val('');
                  $("#change_status").trigger("change.select2");
                  //$("select#change_status")[0].selectedIndex = 0;
                  //$('#change_status option:nth-child(1)').val();
               } else{
                  let status = confirm("Are you sure to change the status of selected records?");
                  if(status){
                     $("#blog_post_status_ids").val(open.join(", "));
                     $("#change_status_form").submit();
                  } else {

                     $("#change_status").val('');
                     $("#change_status").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".blog_post_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("blog_post");
            $("#blog_post_id").val(id);
            
          });

         //For all blog post check and uncheck

            $('#blog_post_all_check').click(function() {
                $('.blog_post_check').prop('checked', this.checked); 
            });

         //End of all blog post check and uncheck



      });

     
  </script>


 
 
       
@endsection
