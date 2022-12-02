<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;

class MerchantMiddleware 
{
    public function handle($request, Closure $next)
    {
        if(auth::check() && Auth::user()->user_status == 1) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }

}