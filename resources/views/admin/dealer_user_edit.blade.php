
@extends('admin.main')

@section('body-content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom mb-0 border-bottom mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold">
                  Edit user 
                  <br><br>
                  @if($data->email)
                    Email Id : {{$data->email}}                  
                  @endif
                  <br><br>
                  @if($data->mobile)
                    Mobile Number : {{$data->mobile}}                  
                  @endif
               </h4>
            </div>
         </div>
         
      </div>
      

      <div class="col-lg-12" id="user_add_model" >
            <div class="card">
               <div id="ajax_dealer_edit_state_loader"></div>
               <form action="{{ route('admin_put_dealer_user_show') }}" method="post" enctype="multipart/form-data" onSubmit="return form_check(this)">
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

                              <div class="col-md-6"> 
                                  <div class="form-group"> 
                                      <label class="mb-1"><strong>Company Name</strong></label>
                                      <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{getFormEditValue($data,'company_name')}}" required >
                                      @if ($errors->has('company_name'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('company_name') }}</p>
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




                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Address</strong></label>
                                    <textarea  class="form-control" name="address">{{getFormEditValue($data,'address')}}</textarea>
                                    @if ($errors->has('address'))
                                        <p class="text-danger mpg_input_error">{{ $errors->first('address') }}</p>
                                    @endif
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Photo</strong></label>
                                    <div class="basic-form custom_file_input">
                                       <div class="input-group">
                                          <div class="form-file" style="padding-top:8px;padding-bottom:8px; border-radius: 0.5rem 0 0 0.5rem;">
                                             <input type="file" name="photo" class="form-file-input form-control">
                                          </div>
                                          <span class="input-group-text">Upload</span>
                                         
                                       </div>
                                       @if ($errors->has('photo'))
                                         <p class="text-danger">{{ $errors->first('photo') }}</p>
                                       @endif
                                    </div>
                                    @if($data->photo)
                                        <div class="basic-form custom_file_input">
                                            <img src="{{Storage::url($data->photo)}}"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                                        </div>
                                    @endif
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Gender</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="clearfix"></div>
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



                              <div class="col-md-6 required"> 
                                 <div class="form-group">
                                      <label class="mb-1"><strong>GST No.</strong></label>
                                      <input type="text" name="gst_no" placeholder="GST No." class="form-control" value="{{getFormEditValue($data,'gst_no')}}" required >  
                                      @if ($errors->has('gst_no'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('gst_no') }}</p>
                                      @endif
                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                 <div class="form-group">
                                   <label class="mb-1"><strong>GST Certificate Document</strong></label>
                                   <input  class="form-control" type="file" name="gst_certificate" >
                                   @if ($errors->has('gst_certificate'))
                                       <p class="text-danger mpg_input_error">{{ $errors->first('gst_certificate') }}</p>
                                   @endif
                                   @if($data->gst_certificate)
                                      <img src="{{Storage::url(findImageIcon($data->gst_certificate))}}"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                      <a title="Download File" href="{{route('admin_download_dealer_user_show',[$data->id,'gst'])}}">Download</a>
                                   @endif

                                 </div>
                             </div>
                             <div class="clearfix"></div>
                             <div class="col-md-6 required"> 
                                  <div class="form-group">
                                      <label class="mb-1"><strong>PAN  No.</strong></label>
                                      <input type="text" name="pan_no" value="{{getFormEditValue($data,'pan_no')}}" placeholder="PAN  No." class="form-control" required>
                                      @if ($errors->has('pan_no'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('pan_no') }}</p>
                                      @endif

                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>PAN  Card Document</strong></label>
                                      <input  class="form-control" type="file" name="pan_card" >
                                      @if ($errors->has('pan_card'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('pan_card') }}</p>
                                      @endif

                                       @if($data->pan_card)
                                          <img src="{{Storage::url(findImageIcon($data->pan_card))}}"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                          <a title="Download File" href="{{route('admin_download_dealer_user_show',[$data->id,'pan'])}}">Download</a>
                                       @endif



                                </div>
                             </div>
                             <div class="clearfix"></div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>ID Proof</strong> </label>
                                      <select class="form-control" name="id_proof" required>
                                         <option value="" >Select Id Proof</option>
                                         <option value="driving_license" @php if(getFormEditValue($data,'id_proof') == 'driving_license') { echo 'selected'; } @endphp  >Driving License</option>
                                         <option value="adhaar_card" @php if(getFormEditValue($data,'id_proof') == 'adhaar_card') { echo 'selected'; } @endphp>Adhaar Card</option>
                                         <option value="passport" @php if(getFormEditValue($data,'id_proof') == 'passport') { echo 'selected'; } @endphp>Passport</option>
                                         <option value="voter_id_card" @php if(getFormEditValue($data,'id_proof') == 'voter_id_card') { echo 'selected'; } @endphp>Voter Id Card</option>
                                      </select>
                                      @if ($errors->has('id_proof'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('id_proof') }}</p>
                                      @endif
                                 </div>
                             </div>
                             <div class="col-md-6 required">
                                  <div class="form-group">
                                      <label class="mb-1"><strong>ID Proof Document</strong></label>
                                      <input  class="form-control" type="file" name="id_proof_document" >
                                      @if ($errors->has('id_proof_document'))
                                          <p class="text-danger mpg_input_error">{{ $errors->first('id_proof_document') }}</p>
                                      @endif

                                       @if($data->id_proof_document)
                                          <img src="{{Storage::url(findImageIcon($data->id_proof_document))}}"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100">&nbsp;
                                          <a title="Download File" href="{{route('admin_download_dealer_user_show',[$data->id,'id'])}}">Download</a>
                                       @endif
                                 </div>
                             </div>

                              
                           
                              
                              <div class="mb-3 col-md-6">
                                 <label class="form-label mb-1" id="status"><strong>Status</strong></label>
                                 <select class="default-select  form-control wide" name="status" required >
                                    <option value="" @if(getFormEditValue($data,'status') == "") selected @endif>Choose Status</option>
                                    <option value="active" @if(getFormEditValue($data,'status') == "active") selected @endif>Active</option>
                                    <option value="inactive" @if(getFormEditValue($data,'status') == "inactive") selected @endif>Inactive</option>
                                 </select>
                                 @if ($errors->has('status'))
                                  <p class="text-danger mpg_input_error">{{ $errors->first('status') }}</p>
                                 @endif
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary">Submit</button>&nbsp; <a href="{{url(route('admin_dealer_user_show').get_edit_redirect_query_string())}}" class="btn btn-danger">Back</a>
                              </div>
                              <div class="col-md-6">
                                
                              </div>
                        </div>
                           
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{$data->id}}">
               </form>   
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
               url:  '/admin/fetch_state_dealer',
               dataType: 'json',
               data:{'country':country,_token: '{{csrf_token()}}'},
               beforeSend: function(){
                   $('#ajax_dealer_edit_state_loader').show();
               },
               complete: function(){
                   $('#ajax_dealer_edit_state_loader').hide();
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

      $("#country").select2();

    })
  
</script>
@endsection
