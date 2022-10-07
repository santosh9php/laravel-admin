@php
   if(Route::currentRouteName() == 'admin_product_show'){
      edit_redirect_query_string('admin_product_show');
   }
@endphp

@extends('admin.main')

@section('body-content')
  <div class="content-body">
      <div class="container-fluid">
         <!-- Add Project -->
         <div class="row page-titles mb-0 border-bottom mx-0">
            <div class="col-sm-6 p-md-0">
               <div class="welcome-text">
                  <h4 class="mt-2 font-weight-bold">  Products Management</h4>
               </div>
            </div>

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
               @can('product-add')
                  <a class="btn btn-success product_add_button" href="{{route('admin_product_form_show')}}">Add Product</a> 
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
         
         @include('admin.product_show')
      </div>
  </div>

   <!--For Model -->
   <!-- Delete product -->
   @include('admin.model.delete_product')
   <!-- End of delete product -->

@endsection

@section('page-js-script')

  <script type="text/javascript">


     $(document).ready(function(){

         $("#bulk_delete").select2();

         $("#change_status").select2();

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='product_ids']:checked"), function () {
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
                     $("#product_bulk_delete_ids").val(open.join(", "));
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
            $.each($("input:checkbox[name='product_ids']:checked"), function () {
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
                     $("#product_status_ids").val(open.join(", "));
                     $("#change_status_form").submit();
                  } else {

                      $("#change_status").val('');
                      $("#change_status").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".product_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("product");
            $("#product_id").val(id);
            
          });

         $("#single-select-segment").select2({});

         $("#single-select-bodypart").select2({});

         $("#single-select-order-by").select2({});
         
      });

     //For all products check and uncheck

      $('#product_all_check').click(function() {
          $('.product_check').prop('checked', this.checked); 
      });

     //End of all products check and uncheck

     
  </script>


 
 
       
@endsection
