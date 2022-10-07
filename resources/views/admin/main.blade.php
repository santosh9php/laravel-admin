@if(Auth::check() and isset(auth()->user()->email_verified_at))
    @include('admin.after_login_layout.header')
    @include('admin.left_menu')
@else
    @include('admin.before_login_layout.header')
@endauth

    @yield('body-content')

@if(Auth::check() and isset(auth()->user()->email_verified_at))
    @include('admin.after_login_layout.footer')
@else
    @include('admin.before_login_layout.footer')
@endauth

    @yield('page-js-script')