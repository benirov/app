<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\contracts\Auth\Guard;

class verifySession
{

    private $auth;

    public function __construc(Guard $auth){
        $this->auth =$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd(\Auth::user());
        return $next($request);
    }
}
