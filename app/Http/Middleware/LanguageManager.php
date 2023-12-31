<?php
  
namespace App\Http\Middleware;
  
use Closure;
use App,Auth;
  
class LanguageManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            App::setLocale(Auth::user()->language_code);
        }
          
        return $next($request);
    }
}