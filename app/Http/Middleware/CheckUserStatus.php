<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CheckUserStatus
{
     public $error ='';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        //return $next($request);
        if (Auth::check()) {
            if (Auth::user()->status != 'active') {

                if (Auth::user()->hasRole('Super Admin') OR Auth::user()->hasPermissionTo('admin-login')) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    $this->error=__('adminMsg.account_not_approve');
                    $request->session()->flash('login', $this->error);
                    return redirect()->route('admin_login');

                } else {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    $this->error=__('frontendMsg.account_not_approve');
                    $request->session()->flash('login', $this->error);
                    return redirect()->route('home');
                    //return redirect()->route('user_login');
                }

            } 
        }
        return $next($request);
    }
}
