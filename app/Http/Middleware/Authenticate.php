<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
           // return route('login');
             //return route('admin_login'); // here is my change
            $route = Route::current();
            if($route->getPrefix() == 'admin' or $route->getPrefix() == '/admin'){
                return route('admin_login'); // here is my change
            } else {
               // return route('user_login'); // here is my change
                 return redirect(route('home')); // here is my change

            }
        }
    }
}
