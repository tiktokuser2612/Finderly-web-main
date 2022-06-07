<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
         if (!Auth::guard($guard)->check() ){
             return redirect(url('/admin'));
        }
         return $next($request);
         
    }
}




