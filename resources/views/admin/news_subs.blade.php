@php
   if(Route::currentRouteName() == 'admin_news_subs_show'){
      edit_redirect_query_string('admin_news_subs_show');
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
                  <h4 class="mt-2 font-weight-bold">  Newsletter Subscribers Management</h4>
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
         
         @include('admin.news_subs_show')
      </div>
  </div>

   <!--For Model -->
   <!-- Delete news_subs -->
   @include('admin.model.delete_news_subs')
   <!-- End of delete news_subs -->

@endsection

@section('page-js-script')

  <script type="text/javascript">


     $(document).ready(function(){

         $("#bulk_delete").select2();

         $("#bulk_delete").change(function(){
            var open = [];
            $.each($("input:checkbox[name='news_subs_ids']:checked"), function () {
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
                     $("#news_subs_bulk_delete_ids").val(open.join(", "));
                     $("#bulk_delete_form").submit();
                  } else {
                     $("#bulk_delete").val('');
                     $("#bulk_delete").trigger("change.select2");
                  }
               }
            } 
           
         });

         $(".news_subs_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("news_subs");
            $("#news_subs_id").val(id);
            
          });

         //For all news check and uncheck

            $('#news_all_check').click(function() {
                $('.news_check').prop('checked', this.checked); 
            });

         //End of all news check and uncheck

      });

     
  </script>


 
 
       
@endsection
