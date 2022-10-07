
@extends('admin.main')

@section('body-content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;"> Edit Profile</h4>
            </div>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="basic-form">
                  <div id="ajax_editprofile_state_loader"></div>
                  <form action="{{ route('admin_editpf') }}" method="post" enctype="multipart/form-data">
                  @csrf
                      <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('success'))
                                <p class="text-success">{!! Session::get('success') !!}</p>
                            @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('error'))
                                <p class="text-danger">{!! Session::get('error') !!}</p>
                            @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>First Name</strong></label>
                              <input type="text" class="form-control" name="fname" value="{{getFormEditValue($data,'fname')}}" required>
                              @if ($errors->has('fname'))
                                <p class="text-danger">{{ $errors->first('fname') }}</p>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>Last Name</strong></label>
                              <input type="text" class="form-control" name="lname" value="{{getFormEditValue($data,'lname')}}" required >
                              @if ($errors->has('lname'))
                                <p class="text-danger">{{ $errors->first('lname') }}</p>
                              @endif
                           </div>
                        </div>
                      </div>
                     <div class="row">

                        <div class="col-md-6">
                                <div class="form-group">
                                      <label class="mb-1"><strong>Country</strong></label>

                                      <select class="form-control wide" name="country" id="country" onchange="show_bill_state(this.value)" required >
                                         <option value="">Select Country</option>
                                         @if($countries)
                                             @foreach($countries as $country)
                                                 <option @if(getFormEditValue($data,'country') == $country->name) selected @endif value="{{$country->name}}">{{$country->name}}</option>
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
                                 @if($data->country == 'India')
                                     <select class="default-select form-control wide" name="state" id="state" required >
                                         <option value="">Select State</option>
                                         @if($states)
                                             @foreach($states as $state)
                                                 <option @if(getFormEditValue($data,'state') == $state->name) selected @endif value="{{$state->name}}">{{$state->name}}</option>
                                             @endforeach
                                         @endif
                                     </select>
                                 @else
                                    <input type="text" name="state" id="state" value="{{getFormEditValue($data,'state')}}" class="form-control" required />
                                 @endif
                              </div>
                              @if ($errors->has('state'))
                                 <p class="text-danger mpg_input_error">{{ $errors->first('state') }}</p>
                              @endif
                           </div> 

                        <div class="col-md-6 required"> 
                            <label>Country Code</label>
                            <select class="form-control wide" name="country_code" id="country_code" required >
                                <option value="">Select Country</option>
                                @if($countries)
                                    @foreach($countries as $country)
                                        <option @if(getFormEditValue($data,'country_code') == $country->phone) selected @endif value="{{$country->phone}}">{{$country->name}}</option>
                                    @endforeach
                                @endif
                            </select>

                            @if ($errors->has('country_code'))
                                <p class="text-danger mpg_input_error">{{ $errors->first('country_code') }}</p>
                            @endif
                         </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="mb-1"><strong>Mobile No.</strong></label>
                              <input type="text" class="form-control" placeholder="" name="mobile" value="{{getFormEditValue($data,'mobile')}}" required>
                              @if ($errors->has('mobile'))
                                <p class="text-danger">{{ $errors->first('mobile') }}</p>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group">
                              <label class="mb-1"><strong>Gender:</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               @if(getFormEditValue($data,'gender') == 'm')
                                  <label class="radio-inline mr-3"><input type="radio"  name="gender" value="m" checked>  Male  </label>&nbsp;&nbsp;
                                  <label class="radio-inline mr-3"><input type="radio" name="gender" value="f"> Female</label> 
                              @else
                                  <label class="radio-inline mr-3"><input type="radio" name="gender" value="m" >  Male  </label>&nbsp;&nbsp;
                                  <label class="radio-inline mr-3"><input type="radio"  name="gender" value="f" checked> Female</label> 

                              @endif
                              @if ($errors->has('gender'))
                                <p class="text-danger">{{ $errors->first('gender') }}</p>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="mb-1"><strong>Photo</strong></label>
                        <div class="basic-form custom_file_input">
                           <div class="input-group">
                              <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                 <input type="file" name="photo" class="form-file-input form-control">
                              </div>
                              <span class="input-group-text">Upload</span>
                              @if ($errors->has('photo'))
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                              @endif
                           </div>
                        </div>
                        @if($data->photo)
                            <div class="basic-form custom_file_input">
                                <img src="{{Storage::url($data->photo)}}"  class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                            </div>
                        @endif
                     </div>
                     <div class="row">
                        
                     </div>
                     <div class="form-group">
                        <label class="mb-1"><strong>Address</strong></label>
                        <textarea  class="form-control" name="address">{{getFormEditValue($data,'address')}}</textarea>
                        @if ($errors->has('address'))
                            <p class="text-danger mpg_input_error">{{ $errors->first('address') }}</p>
                        @endif
                     </div>
                    
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('page-js-script')


<script type="text/javascript">

   function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_admin',
               dataType: 'json',
               data:{'country':country,_token: '{{csrf_token()}}'},
               beforeSend: function(){
                   $('#ajax_editprofile_state_loader').show();
               },
               complete: function(){
                   $('#ajax_editprofile_state_loader').hide();
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

    $(document).ready(function(){

      $("#country_code").select2();

      $("#country").select2();

    })
  
</script>
@endsection