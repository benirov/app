<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

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
        if(session()->get('sessionActive')){
            dd($request);    
        }
        else{
         dd('no logueado')       
        }
        return $next($request);
    }
}
