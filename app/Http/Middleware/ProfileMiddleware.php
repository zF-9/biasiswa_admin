<?php

namespace App\Http\Middleware;

use Closure;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     
    public function handle($request, Closure $next)
    {
        return $next($request);
    }*/
    public function handle($request, Closure $next)
    {
        
        //return $next($request);
        if(auth()->user()->isAdmin == 1){ //isAdmin is [Boolean] define: manually dari mysql table dalam Database
            return $next($request);
        }
        return redirect('User.ProfilepageUser')->with('error','You have not admin access');
    }

}
