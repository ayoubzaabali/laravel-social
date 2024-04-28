<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class CheckMethod
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
        if ( $request->isMethod('get') ) {
           Auth::logout();
           return redirect('login'); 
        }
        
        return $next($request);
    }
}
