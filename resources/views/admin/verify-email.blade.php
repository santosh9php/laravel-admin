
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
                                 <h1>Verify email</h1>

                                 <p>Please verify your email address by clicking the link in the mail we sent you. Thanks!</p>
                                 
                                 <form action="{{ route('verification.request') }}" method="post">
                                    @csrf
                                     <button type="submit">Request a new link</button>
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
