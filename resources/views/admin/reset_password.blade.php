
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
                              <h3 class="text-center mb-4">Reset Password</h3>
                              <form method="POST" action="{{ route('admin_password_update') }}" >
                               @csrf
                                @if (Session::has('status'))
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error">{{ Session::get('status') }}</p>
                                  <div>
                                @endif
                                 @error('email')
                                  <div class="form-group">
                                    <p class="text-danger mpg_top_error">{{ $message}}</p>
                                  <div>
                                @enderror
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ request()->query('email') }}">
                                
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password" required >
                                 </div>
                                 @error('password')
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error">{{$message}}</p>
                                  <div>
                                 @enderror
                                 <div class="form-group">
                                    <label class="mb-1"><strong>Confirm Password</strong></label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                 </div>
                                 @error('password_confirmation')
                                 <div class="form-group">
                                    <p class="text-danger mpg_input_error">{{$message}}</p>
                                  <div>
                                 @enderror
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
