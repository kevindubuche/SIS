<?php

namespace App\Https\Middleware;

use Closure;
use Session;
class StudentLogin
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
        if(empty(Session::has('studentSession'))){//check if the session id not empty
            return redirect('/student');
        }
        return $next($request);
    }
}
