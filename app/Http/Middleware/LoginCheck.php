<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;


class LoginCheck
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
        if(Auth::User()){
        return $next($request);
        }
        else{
        return redirect('login')->with('error', 'You cannot access!');
        }
        
    }
}
