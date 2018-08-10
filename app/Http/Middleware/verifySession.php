<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class verifySession
{

    // private $auth;

    // public function __construc(Guard $auth){
    //     $this->auth =$auth;
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
    *  @param string $session
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // session()->get("sessionActive");
         if(!session()->get("sessionActive")){
            return redirect('/login');
        }
        return $next($request);
    }
}
