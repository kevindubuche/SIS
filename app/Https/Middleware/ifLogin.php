<?php

namespace App\Https\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;

class ifLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Https\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check())
        {
            return back();
        }
        
        return $next($request);
    }
}
