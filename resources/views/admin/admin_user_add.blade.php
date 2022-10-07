
@extends('admin.main')


@section('body-content')

  <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">Add user</h4>
            </div>
         </div>
         
      </div>

      <div class="col-lg-12" id="user_add_model" >
         <div class="card">
            <div id="ajax_admin_user_add_state_loader"></div>
            <form action="{{ route('admin_post_user_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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

                           
                        <div class="row">

                           <div class="col-md-6">
                              <div class="form-group">
                                   <label class="mb-1"><strong>First Name</strong></label>
                                   <input type="text" class="form-control" name="fname" value="{{old('fname')}}" required />
                                   @if ($errors->has('fname'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('fname') }}</p>
                                   @endif
                               </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                               <label class="mb-1"><strong>Last Name</strong></label>
                               <input type="text" class="form-control" name="lname" value="{{old('lname')}}" required >
                               @if ($errors->has('lname'))
                                 <p class="text-danger mpg_input_error">{{ $errors->first('lname') }}</p>
                               @endif
                            </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Email Id</strong></label>
                                 <input type="email" class="form-control" placeholder="" name="email" value="{{old('email')}}" required>
                                 @if ($errors->has('email'))
                                   <p class="text-danger mpg_input_error">{{ $errors->first('email') }}</p>
                                 @endif
                              </div>
                           </div>

                           <div class="col-md-6">
                                <div class="form-group">
                                      <label class="mb-1"><strong>Country</strong></label>

                                      <select class="form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
                                         <option value="">Select Country</option>
                                         @if($countries)
                                             @foreach($countries as $country)
                                                 <option @if(old('country') == $country->name) selected @endif value="{{$country->name}}">{{$country->name}}</option>
                                             @endforeach
                                         @endif
                                      </select>
                                      @if ($errors->has('country'))
                                         <p class="text-danger mpg_input_error">{{ $errors->first('country') }}</p>
                                      @endif
                                </div>
                           </div> 

                           <div class="col-md-6">
                              <label class="mb-1"><strong>State</strong></label>
                              <div id="billing_state">
                                    <input type="text" name="state" id="state" value="{{old('state')}}" class="form-control" required />
                              </div>
                              @if ($errors->has('state'))
                                 <p class="text-danger mpg_input_error">{{ $errors->first('state') }}</p>
                              @endif
                           </div> 


                           <div class="col-md-3 required"> 
                               <label><strong>Country Code</strong></label>

                               @php
                                   $country_select ='';
                                   if(old('country_code') == ''){$country_select ='';} else {$country_select =old('country_code');}
                               @endphp

                               <select class="country_code form-control wide" name="country_code" id="country_code" required >
                                   <option value="">Select Country</option>
                                   @if($countries)
                                       @foreach($countries as $country)
                                           <option @if($country_select == $country->phone) selected @endif value="{{$country->phone}}">{{$country->name}}</option>
                                       @endforeach
                                   @endif
                               </select>

                               @if ($errors->has('country_code'))
                                   <p class="text-danger mpg_input_error">{{ $errors->first('country_code') }}</p>
                               @endif
                            </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Mobile No.</strong></label>
                                 <input type="text" class="form-control" placeholder="" name="mobile" value="{{old('mobile')}}" required>
                                 @if ($errors->has('mobile'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('mobile') }}</p>
                                 @endif
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Photo</strong></label>
                                 <div class="basic-form custom_file_input"> 
                                    <div class="input-group">
                                       <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                          <input type="file" class="form-file-input form-control" name="photo">
                                       </div>
                                       <span class="input-group-text">Upload</span>
                                    </div>
                                    @if ($errors->has('photo'))
                                      <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @endif
                                    </div>
                                 </div>
                              </div>

                           <div class="col-md-6 mt-6">
                               @if(old('gender') === null OR old('gender') == 'm')
                                 <div class="form-group">
                                     <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <div class="clearfix"></div>
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="m" checked>  Male  </label>&nbsp;&nbsp;
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="f"> Female</label> 
                                    @if ($errors->has('gender'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('gender') }}</p>
                                    @endif

                                 </div>
                              @else
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="clearfix"></div>
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="m" >  Male  </label>&nbsp;&nbsp;
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="gender" value="f" checked> Female</label> 
                                    @if ($errors->has('gender'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('gender') }}</p>
                                    @endif
                                 </div>
                              @endif
                           </div>  

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Address</strong></label>
                                 <textarea  class="form-control" name="address">{{old('address')}}</textarea>
                                 @if ($errors->has('address'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('address') }}</p>
                                 @endif
                              </div>
                           </div> 

                           <div class="col-md-6">
                              <div class="form-group">
                                  <label class="mb-1"><strong>Password</strong></label>
                                 <input type="password" class="form-control" placeholder="" name="password" required>
                               
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="mb-1"><strong>Confirm Password</strong></label>
                                 <input type="password" class="form-control" placeholder="" name="password_confirmation" required>
                              </div>
                           </div>

                        </div>

                        @if ($errors->has('password'))
                           <div class="row">
                             <div class="col-md-12">
                               <p class="text-danger mpg_input_error">{{ $errors->first('password') }}</p>
                             </div>
                           </div>
                       @endif

                       <div class="row">

                           <div class="col-md-6 required"> 
                                 <div class="form-group">
                                     <label class="mb-1"><strong>Role</strong></label>
                                     @php
                                         $role_select ='';
                                         if(old('role') == ''){$role_select ='';} else {$role_select =old('role');}
                                     @endphp
                                     <select class="form-control wide" name="role" id="role" required>
                                         <option value="">Select Role</option>
                                         @if($roles)
                                             @foreach($roles as $role)
                                                 <option @if($role_select == $role) selected @endif value="{{$role}}">{{$role}}</option>
                                             @endforeach
                                         @endif
                                     </select>
                                     @if ($errors->has('role'))
                                         <p class="text-danger mpg_input_error">{{ $errors->first('role') }}</p>
                                     @endif
                                 </div>
                           </div>

                           <div class="col-md-6 required"></div> 

                       </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{route('admin_user_show')}}" class="btn btn-danger">Back</a>
                           
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


<script type="text/javascript">

   $(document).ready(function(){

      $("#country").select2();

      $(".country_code").select2();

      $("#role").select2();
   })

    function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_admin',
               dataType: 'json',
               data:{'country':country,_token: '{{csrf_token()}}'},
               beforeSend: function(){
                   $('#ajax_admin_user_add_state_loader').show();
               },
               complete: function(){
                   $('#ajax_admin_user_add_state_loader').hide();
               },
               success: function (data) {
                  console.log(data);
                  $('#billing_state').html(data.state);
               },
               error: function (requestObj, textStatus, errorThrown) {
                   console.log(requestObj);
               },
           });
        }
    }

   
</script>
@endsection
