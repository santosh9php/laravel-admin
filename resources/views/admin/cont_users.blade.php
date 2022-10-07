@php
   if(Route::currentRouteName() == 'admin_cont_users_show'){
      edit_redirect_query_string('admin_cont_users_show');
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
                  <h4 class="mt-2 font-weight-bold">  Contact Us  Management</h4>
               </div>
            </div>

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
              &nbsp;
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
         
         @include('admin.cont_users_show')
      </div>
  </div>

   <!--For Model -->
   <!-- Delete cont_users -->
   @include('admin.model.delete_cont_users')
   <!-- End of delete cont_users -->

@endsection

@section('page-js-script')

  <script type="text/javascript">


     $(document).ready(function(){

         $("#bulk_delete").select2();

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='cont_users_ids']:checked"), function () {
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
                     $("#cont_users_bulk_delete_ids").val(open.join(", "));
                     $("#bulk_delete_form").submit();
                  } else {
                     $("#bulk_delete").val('');
                     $("#bulk_delete").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".cont_users_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("cont_users");
            $("#cont_users_id").val(id);
            
          });

         //For all contacts check and uncheck

            $('#cont_all_check').click(function() {
                $('.cont_check').prop('checked', this.checked); 
            });

         //End of all contacts check and uncheck

      });

     
  </script>


 
 
       
@endsection
