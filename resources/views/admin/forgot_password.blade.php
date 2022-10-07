
@extends('admin.main')

@section('body-content')
      <div class="authincation h-100">
         <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-6">
                  <div class="authincation-content">
                     <div class="row no-gutters">
                        <div class="col-xl-12">
                           <div class="auth-form">
                              <div class="text-center mb-3">
                                 <img src="{{asset('admin_assets/images/logo-full-black.png')}}" alt="">
                              </div>
                              <br>
                              <h3 class="text-center mb-4">Forgot Password</h3>
                              <form action="{{ route('admin_post_forgot_password') }}" method="post"> 
                                 @csrf
                                 @if (Session::has('status'))
                                    <div class="form-group">
                                       <p class="text-danger mpg_top_error">{{ Session::get('status') }}</p>
                                    <div>
                                  @endif
                                  <div class="form-group">
                                    <label class="mb-1"><strong>Email Id</strong></label>
                                    <input type="email" class="form-control" name="email" required>
                                 </div>
                                 @error('email')
                                  <div class="form-group">
                                    <p class="text-danger mpg_input_error">{{$message}}</p>
                                  <div>
                                 @enderror
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
