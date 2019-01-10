<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth ;
class Student
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
         if(Auth::check()){
            if(Auth::user()->isStudent() || Auth::user()->isTeacher() || Auth::user()->isAdmin()){
                return $next($request);
            }
        }
         return abort(403) ;
    }
}
