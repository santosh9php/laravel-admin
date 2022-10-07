
@extends('admin.main')

@section('body-content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Edit role</h4>
            </div>
         </div>
         
      </div>
      

      <div class="col-lg-12" id="role_add_model" >
            <div class="card">
               <div id="ajax_admin_role_edit_state_loader"></div>
               <form action="{{ route('admin_put_role_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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
                           <div class="row">

                              
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Name</strong></label>
                                 @if($data->name != 'Super Admin')
                                    <input type="text" class="form-control" name="name" value="{{getFormEditValue($data,'name')}}" required>
                                    
                                 @else
                                    <input type="hidden" class="form-control" name="name" value="{{$data->name}}">
                                    <lable><br>{{$data->name}}</lable>
                                 @endif
                                    @if ($errors->has('name'))
                                      <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                 </div>
                              </div>

                             
                              <div class="col-md-12">
                              <div class="form-group">
                               <label class="mb-1"><strong>Permissions</strong></label>
                                 <br />
                                 <label>
                                    <input class="form-check-input" type="checkbox" name="all_check" id="all_check" value="all"  >&nbsp;&nbsp;All
                                 </label>
                                  <br />
                                 <div class="row">
                                       @php $count = 0; @endphp
                                       @foreach($permissions as $permission)
                                          @php 
                                             if($count == 0){
                                                echo '<div class="col-md-3">';
                                             }
                                          @endphp
                                          <label>
                                             <input class="form-check-input permission_check" type="checkbox" name="permission[]" value="{{$permission->id}}" @if(in_array($permission->id, $rolePermissions) ) checked @endif  >&nbsp;&nbsp;{{ $permission->displayName }}
                                          </label>
                                          <br/>
                                          @php 
                                             if($count == 0){
                                                
                                             }
                                             $count++;

                                             if($count == 12){
                                                echo '</div>';
                                               $count = 0;
                                             }
                                             
                                          @endphp
                                       @endforeach
                                       @if($count != 12 && $count != 0)
                                           </div>
                                       @endif
                                       @if ($errors->has('permission'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('permission') }}</p>
                                       @endif
                                 </div>
                            </div>
                           </div>
                      
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{url(route('admin_role_show').get_edit_redirect_query_string())}}" class="btn btn-danger">Back</a>
                              </div>
                              <div class="col-md-6">
                                
                              </div>
                        </div>
                           
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="role_id" value="{{$data->id}}">
               </form>   
            </div>
            
      </div>
      
   </div>
</div>


@endsection


@section('page-js-script')


<script type="text/javascript">

   $(document).ready(function(){

      //For all check and uncheck

      $('#all_check').click(function() {
          $('.permission_check').prop('checked', this.checked); 
      });

     //End of users check and uncheck

   })

    
  
</script>
@endsection
