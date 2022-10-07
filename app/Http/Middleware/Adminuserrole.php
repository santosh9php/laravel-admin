<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class Adminuserrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public $error ='';

    public function handle(Request $request, Closure $next)
    {
        $this->error=__('adminMsg.login_error');
        /*
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        */

        if (Auth::check()) {
            if (!(Auth::user()->hasRole('Super Admin') OR Auth::user()->hasPermissionTo('admin-login'))) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $request->session()->flash('login', $this->error);
                return redirect()->route('admin_login');
            } 
        }
        return $next($request);
    }
}
