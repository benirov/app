<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class verifyPermission
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
        foreach (Session::get('permision') as $key) {
            switch ($key) {
                case 1:
                    # Create...
                    break;
                case 2:
                    # Read...
                    break;
                case 3:
                    # Update...
                    break;
                case 4:
                    # Delete...
                    break;
                
                default:
                    # code...
                    break;
        }
        return $next($request);
    }
}
