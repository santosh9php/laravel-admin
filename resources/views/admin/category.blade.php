@php
   if(Route::currentRouteName() == 'admin_category_show'){
      edit_redirect_query_string('admin_category_show');
   }
@endphp

@extends('admin.main')

@section('body-content')
  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mx-0 mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Categories Management </h4>
            </div>
         </div>

         <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

            @can('category-add')

               <a class="btn btn-success page_add_button" href="{{route('admin_category_form_show')}}"> Add Category </a>

            @endcan
         </div>
      </div>

      @if(Session::has('success') || Session::has('error'))
         <div class="row page-titles  mb-0 border-bottom mx-0">
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

      
      @include('admin.category_show')
   </div>
  </div>

   <!--For Model -->
   <!-- Delete Category -->
   @include('admin.model.delete_category')
   <!-- End of delete category -->

@endsection

@section('page-js-script')
  <script type="text/javascript">

     $(document).ready(function(){

         $("#change_status").select2();


         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='cat_ids']:checked"), function () {
               open.push($(this).val());
            });
             //alert("We remain open on: " + open.join(", "));
             //alert($("#change_status").val());
            if($("#bulk_delete").val() != ""){
               if(open.length < 1){
                  alert("Checked at least one record.")
                  $("#bulk_delete").val('');
                  document.getElementById("bulk_delete").selectedIndex = "0";
                  //$("select#change_status")[0].selectedIndex = 0;
                  //$('#change_status option:nth-child(1)').val();
               } else{
                  $("#category_bulk_delete_ids").val(open.join(", "));
                  $("#bulk_delete_form").submit();
               }
            } 
           
         });

         $("#change_status").change(function(){
            var open = [];
            $.each($("input:checkbox[name='cat_ids']:checked"), function () {
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
                     $("#category_status_ids").val(open.join(", "));
                     $("#change_status_form").submit();
                  } else{
                     $("#change_status").val('');
                     $("#change_status").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".category_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("category");
            $("#category_id").val(id);
            //var token = $("meta[name='csrf-token']").attr("content");
            //alert($("#category_id").val());
          });

         //$('#category_add_model').hide();
         $('.category_add_button').click(function(){

            $('#category_add_model').toggle();
         });

         $('#category_hide_form').click(function(){

            $('#category_add_model').hide();
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


          //For all category check and uncheck

            $('#cat_all_check').click(function() {
                $('.cat_check').prop('checked', this.checked); 
            });

         //End of all category check and uncheck

      });

      
  </script>

       
@endsection

