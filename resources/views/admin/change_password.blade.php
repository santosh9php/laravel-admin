
@extends('admin.main')

@section('body-content')
    <div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mb-0 border-bottom">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4 class="mt-2 font-weight-bold text-uppercase" style="font-size:27px;"> Change Password</h4>
            </div>
         </div>
         
      </div>
      <div class="col-lg-12">
         <div class="card">
    
            <div class="card-body">
               <form action="{{ route('admin_post_changeup') }}" method="post">
                @csrf
                   <div class="basic-form">
                        <div class="row">
                            <div class="mb-12 col-md-12">
                                @if (Session::has('success'))
                                    <p class="text-success">{!! Session::get('success') !!}</p>
                                @endif
                            </div>
                        </div>
                         <div class="row">
                            <div class="mb-12 col-md-12">
                                @if (Session::has('error'))
                                    <p class="text-danger">{!! Session::get('error') !!}</p>
                                @endif
                            </div>
                        </div>
                         <div class="row">
                         
                            <div class="mb-3 col-md-3">
                               <label class="form-label">User Name: <b> {{ auth()->user()->fname." ".auth()->user()->lname }}</b></label> 
                            </div>

                            <div class="clearfix"></div>

                            <div class="mb-3 col-md-3">
                               <label class="form-label">Old Password</label>
                               <input type="password" class="form-control" name="old_password" required >
                            </div>

                            <div class="mb-3 col-md-3">
                               <label class="form-label">New Password</label>
                               <input type="password" class="form-control" name="new_password" required>
                            </div>


                            <div class="mb-3 col-md-3">
                               <label class="form-label">Confirm Password</label>
                               <input type="password" class="form-control" name="new_password_confirmation" required>
                            </div>

                           
                         </div>
                         <div class="row">
                            <div class="col-md-12">  
                                @if ($errors->has('old_password'))
                                    <p class="text-danger">{{ $errors->first('old_password') }}</p>
                                @endif
                                @if ($errors->has('new_password'))
                                    <p class="text-danger">{{ $errors->first('new_password') }}</p>
                                @endif
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">  
                               <button class="btn btn-primary">Submit</button>
                            </div>
                         </div>
                   </div>
              </form>
            </div>
         </div>
      </div>
  
   </div>
</div>
@endsection
