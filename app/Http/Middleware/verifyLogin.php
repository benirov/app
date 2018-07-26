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

        if(isset($_SESSION['sessionActive'])){
            if($_SESSION['sessionActive']){
                return redirect('/home'); 
                }    
            
        }
        return $next($request);
    }
}
