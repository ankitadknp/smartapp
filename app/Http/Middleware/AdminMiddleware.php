<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;

class AdminMiddleware 
{
    public function handle($request, Closure $next)
    {
        if(auth::check() && Auth::user()->user_status == 3) {
            return $next($request);
        } else  if(auth::check() && Auth::user()->user_status == 4) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }

}