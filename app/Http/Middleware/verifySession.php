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
        // dd($request->path());
        // if(Session::get("sessionActive") && $request->path() == 'login'){
        //     return redirect('/home'); 
        // }
        if(!Session::get("sessionActive")){
            return redirect('/login'); 
        }
        // if()
        return $next($request);
    }
}
