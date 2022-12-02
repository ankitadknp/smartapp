<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->user_status == 3) {
            return redirect('/dashboard');
        } else if (Auth::guard($guard)->check() && Auth::user()->user_status == 4) {
            return redirect('/dashboard');
        } else if (Auth::guard($guard)->check() && Auth::user()->user_status == 1) {
            return redirect()->route('merchantapp.dashboard');
        } else {
            return $next($request);
        }
    }
}
