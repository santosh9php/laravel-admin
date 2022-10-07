
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
            <div id="ajax_dealer_add_state_loader"></div>
            <form action="{{ route('admin_post_dealer_user_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="{{old('fname')}}" required />
                                @if ($errors->has('fname'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('fname') }}</p>
                                @endif
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">  
                                <label class="mb-1"><strong>Last Name</strong></label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="{{old('lname')}}" required >
                                @if ($errors->has('lname'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('lname') }}</p>
                                @endif
                              </div>
                          </div>

                          <div class="col-md-6"> 
                               <div class="form-group"> 
                                   <label class="mb-1"><strong>Company Name</strong></label>
                                   <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{old('company_name')}}" required >
                                   @if ($errors->has('company_name'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('company_name') }}</p>
                                   @endif
                              </div>
                          </div>

                          <div class="col-md-6"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>E-Mail</strong></label>
                                   <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required >
                                   @if ($errors->has('email'))
                                     <p class="text-danger mpg_input_error">{{ $errors->first('email') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="clearfix"></div>

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

                           <div class="clearfix"></div>

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

                          <div class="col-md-3 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>Mobile No.</strong></label>
                                   <input type="text" class="form-control" placeholder="Mobile No." name="mobile" value="{{old('mobile')}}" required>
                                   @if ($errors->has('mobile'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('mobile') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="col-md-6 required"> 
                              <div class="form-group">
                                   <label class="mb-1"><strong>Photo</strong></label>
                                   <input  class="form-control" placeholder="Photo" type="file" name="photo" >
                                   @if ($errors->has('photo'))
                                     <p class="text-danger">{{ $errors->first('photo') }}</p>
                                   @endif
                              </div>
                          </div>

                         <div class="col-md-6 required"> 
                           <div class="form-group">
                             <label class="mb-1"><strong>Address</strong></label>
                             <textarea  class="form-control" placeholder="Address" name="address">{{old('address')}}</textarea>
                             @if ($errors->has('address'))
                                 <p class="text-danger mpg_input_error">{{ $errors->first('address') }}</p>
                             @endif
                           </div>
                         </div>

                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>Gender</strong></label> <br>
                                   @if(old('gender') === null OR old('gender') == 'm')
                                       <label class="radio-inline">
                                           <input type="radio" name="gender" value="m" checked> Male
                                       </label>
                                       <label class="radio-inline">
                                           <input type="radio" name="gender" value="f"> Female
                                       </label>
                                       @if ($errors->has('gender'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('gender') }}</p>
                                       @endif
                                   @else
                                       <label class="radio-inline">
                                           <input type="radio" name="gender" value="m" > Male
                                       </label>
                                       <label class="radio-inline">
                                           <input type="radio" name="gender" value="f" checked> Female
                                       </label>
                                       @if ($errors->has('gender'))
                                           <p class="text-danger mpg_input_error">{{ $errors->first('gender') }}</p>
                                       @endif
                                   @endif
                              </div>
                          </div> 
                          <div class="clearfix"></div>
                         
                          <div class="col-md-6 required"> 
                              <div class="form-group">
                                   <label class="mb-1"><strong>GST No.</strong></label>
                                   <input type="text" name="gst_no" placeholder="GST No." class="form-control" value="{{old('gst_no')}}" required >  
                                   @if ($errors->has('gst_no'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('gst_no') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="col-md-6 required">
                              <div class="form-group">
                                <label class="mb-1"><strong>GST Certificate Document</strong></label>
                                <input  class="form-control" type="file" name="gst_certificate" required>
                                @if ($errors->has('gst_certificate'))
                                    <p class="text-danger mpg_input_error">{{ $errors->first('gst_certificate') }}</p>
                                @endif
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong>PAN  No.</strong></label>
                                   <input type="text" name="pan_no" value="{{old('pan_no')}}" placeholder="PAN  No." class="form-control" required>
                                   @if ($errors->has('pan_no'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('pan_no') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>PAN  Card Document</strong></label>
                                   <input  class="form-control" type="file" name="pan_card" required>
                                   @if ($errors->has('pan_card'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('pan_card') }}</p>
                                   @endif
                             </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>ID Proof</strong> </label>
                                   <select class="form-control" name="id_proof" required>
                                      <option value="" >Select Id Proof</option>
                                      <option value="driving_license" @php if(old('id_proof') == 'driving_license') { echo 'selected'; } @endphp  >Driving License</option>
                                      <option value="adhaar_card" @php if(old('id_proof') == 'adhaar_card') { echo 'selected'; } @endphp>Adhaar Card</option>
                                      <option value="passport" @php if(old('id_proof') == 'passport') { echo 'selected'; } @endphp>Passport</option>
                                      <option value="voter_id_card" @php if(old('id_proof') == 'voter_id_card') { echo 'selected'; } @endphp>Voter Id Card</option>
                                   </select>
                                   @if ($errors->has('id_proof'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('id_proof') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="col-md-6 required">
                               <div class="form-group">
                                   <label class="mb-1"><strong>ID Proof Document</strong></label>
                                   <input  class="form-control" type="file" name="id_proof_document" required>
                                   @if ($errors->has('id_proof_document'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('id_proof_document') }}</p>
                                   @endif
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 required"> 
                               <div class="form-group">
                                   <label class="mb-1"><strong> Password</strong></label>  
                                   <input type="password" class="form-control" placeholder="Password" name="password" required>
                              </div>
                             
                          </div>
                          <div class="col-md-6 required"> 
                            <div class="form-group">
                                <label class="mb-1"><strong>Confirm Password</strong></label> 

                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                              </div>

                          </div>
                         @if ($errors->has('password'))
                           <div class="col-md-12">
                             <p class="text-danger mpg_input_error">{{ $errors->first('password') }}</p>
                           </div>
                         @endif

                        </div>
                                              
                        
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{route('admin_dealer_user_show')}}" class="btn btn-danger">Back</a>
                           
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
    })


     function show_bill_state(country){
        if(country != ''){
            $.ajax({
               type: 'GET',
               url:  '/admin/fetch_state_dealer',
               dataType: 'json',
               data:{'country':country,_token: '{{csrf_token()}}'},
               beforeSend: function(){
                   $('#ajax_dealer_add_state_loader').show();
               },
               complete: function(){
                   $('#ajax_dealer_add_state_loader').hide();
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
