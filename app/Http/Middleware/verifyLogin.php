<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
// use Session;

class verifyLogin
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
        // $session = Session::get("sessionActive");
        // if(isset($session))
        // {
        //     if($session){
        //         return redirect('/home');     
        //     }
            
        // }

        if(isset($_SESSION['sessionActive'])){
            if($_SESSION['sessionActive']){
                return redirect('/home'); 
                }    
            
        }
        // dd($request);
        return $next($request);
    }
}
