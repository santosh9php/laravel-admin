@php
   if(Route::currentRouteName() == 'admin_role_show'){
      edit_redirect_query_string('admin_role_show');
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
                  <h4 class="mt-2 font-weight-bold">Roles Management</h4>
               </div>
            </div>

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
               @can('role-add')

                  <a class="btn btn-success product_add_button" href="{{route('admin_role_form_show')}}">Add Role</a> 
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
         
         @include('admin.role_show')
      </div>
  </div>

   <!--For Model -->
   <!-- Delete role -->
   @include('admin.model.delete_role')
   <!-- End of delete role -->

@endsection

@section('page-js-script')

  <script type="text/javascript">
     $(document).ready(function(){
         $(".role_delete").click(function(){
            //event.preventDefault();
            var id = $(this).data("role");
            $("#role_id").val(id);
            
          });
      });
  </script>
@endsection
