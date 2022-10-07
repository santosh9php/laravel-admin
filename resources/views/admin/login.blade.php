
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
                              <form action="{{ route('admin_post_login') }}" method="post"> 
                                 @csrf
                                 @if (Session::has('verified'))
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error">{!! Session::get('verified') !!}</p>
                                  <div>
                                  @endif
                                 @if (Session::has('login'))
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error">{!! Session::get('login') !!}</p>
                                  <div>
                                  @endif
                                  @if (Session::has('status'))
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error">{{ Session::get('status') }}</p>
                                  <div>
                                  @endif

                                 <div class="form-group">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" class="form-control" placeholder="" name="email" value="{{$email}}" required>
                                 </div>
                                 @error('email')
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error">{{$message}}</p>
                                  <div>
                                 @enderror
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control" placeholder="" name="password" value="{{$password}}" required>
                                 </div>
                                 @error('password')
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error">{{$message}}</p>
                                  <div>
                                 @enderror
                                 <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                       <div class="custom-control custom-checkbox ms-1">
                                          <input type="checkbox" class="form-check-input" id="basic_checkbox_1" name="remember"  value="1" {{$remember}}  >
                                          <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                       </div>
                                    </div>
                                    @if(Route::has('admin_forgot_password'))
                                      <div class="form-group">
                                         <a href="{{route('admin_forgot_password')}}">Forgot Password?</a>
                                      </div>
                                    @endif
                                 </div>
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                 </div>
                              </form>
                               @if(Route::has('admin_register'))
                                <div class="new-account mt-3">
                                 {{--  <p>Don't have an account? <a class="text-primary" href="{{route('admin_register')}}">Sign up</a></p> --}}
                                </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  @endsection
