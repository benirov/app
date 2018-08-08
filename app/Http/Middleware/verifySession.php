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
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // session('key')
        // Session::put("sessionActive", 1);
        if(session('sessionActive') != 1  || !session('sessionActive') ){
            return redirect('/login'); 
        }
        return $next($request);
    }
}
