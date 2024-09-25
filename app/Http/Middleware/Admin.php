<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //function checks request if user that is trying to access admin dashboard is 'admin', if not they will be redirected to user dashboard

        if(Auth::user()->role != 'admin' ){
            return redirect('user/dashboard');
        }

        return $next($request);
    }
}
